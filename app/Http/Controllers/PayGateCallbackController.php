<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SecurePaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PayGateCallbackController extends Controller
{
    /**
     * Handle Crypto payment callback from checkout.harmostays.com
     */
    public function handleCallback(Request $request)
    {
        Log::info('Crypto Payment Callback Received', $request->all());

        // Validate required parameters
        $status = $request->query('status');
        $bookingId = $request->query('booking_id');
        $amountPaid = $request->query('amount_paid');
        $transactionId = $request->query('transaction_id');
        $signature = $request->query('signature');

        if (!$status || !$bookingId) {
            Log::error('Crypto Payment Callback: Missing required parameters', $request->all());
            return response('Invalid parameters', 400);
        }

        // Verify signature for security
        $secret = config('services.paygate.secret');
        if ($secret && $signature) {
            $params = $request->except('signature');
            $expectedSignature = hash_hmac('sha256', http_build_query($params), $secret);
            
            if (!hash_equals($expectedSignature, $signature)) {
                Log::error('PayGate Callback: Invalid signature', [
                    'expected' => $expectedSignature,
                    'received' => $signature,
                    'params' => $params
                ]);
                return response('Invalid signature', 403);
            }
        }

        // Find the order
        $order = Order::where('order_number', $bookingId)->first();
        if (!$order) {
            Log::error('Crypto Payment Callback: Order not found', ['booking_id' => $bookingId]);
            return response('Booking not found', 404);
        }

        // Find or create secure payment transaction
        $secureTransaction = SecurePaymentTransaction::where('booking_id', $bookingId)
            ->where('status', 'pending')
            ->first();

        if (!$secureTransaction) {
            Log::error('Crypto Payment Callback: Secure transaction not found', ['booking_id' => $bookingId]);
            return response('Transaction not found', 404);
        }

        DB::beginTransaction();
        try {
            if ($status === 'success') {
                // Update secure payment transaction
                $secureTransaction->update([
                    'status' => 'paid',
                    'external_transaction_id' => $transactionId,
                    'paid_at' => now(),
                    'callback_data' => $request->all()
                ]);

                // Update order status
                $order->update([
                    'status' => 3, // Approved
                    'payment_status' => 1, // Paid
                ]);

                // Send confirmation email
                try {
                    email_send('booking_mail', $order->email);
                } catch (\Exception $e) {
                    Log::warning('Failed to send booking confirmation email', [
                        'order_id' => $order->id,
                        'error' => $e->getMessage()
                    ]);
                }

                DB::commit();
                Log::info('PayGate Payment Success', [
                    'booking_id' => $bookingId,
                    'transaction_id' => $transactionId,
                    'amount' => $amountPaid
                ]);

                // Redirect to success page
                return redirect()->route('paygate.success', ['booking_id' => $bookingId])
                    ->with('success', 'Payment completed successfully!');

            } else {
                // Handle failed payment
                $secureTransaction->update([
                    'status' => 'failed',
                    'external_transaction_id' => $transactionId,
                    'callback_data' => $request->all()
                ]);

                $order->update([
                    'status' => 4, // Cancelled
                    'payment_status' => 2, // Unpaid
                ]);

                DB::commit();
                Log::info('PayGate Payment Failed', [
                    'booking_id' => $bookingId,
                    'transaction_id' => $transactionId
                ]);

                return redirect()->route('paygate.failed', ['booking_id' => $bookingId])
                    ->with('error', 'Payment failed. Please try again.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Crypto Payment Callback Error', [
                'error' => $e->getMessage(),
                'booking_id' => $bookingId
            ]);

            return redirect()->route('paygate.failed', ['booking_id' => $bookingId])
                ->with('error', 'An error occurred processing your payment.');
        }
    }

    /**
     * PayGate success page
     */
    public function success(Request $request)
    {
        $bookingId = $request->query('booking_id');
        
        if (!$bookingId) {
            return redirect()->route('home.page')->with('error', 'Invalid booking reference.');
        }

        $order = Order::where('order_number', $bookingId)->first();
        $secureTransaction = SecurePaymentTransaction::where('booking_id', $bookingId)
            ->where('status', 'paid')
            ->first();

        if (!$order || !$secureTransaction) {
            return redirect()->route('home.page')->with('error', 'Booking not found.');
        }

        $templateId = get_setting('theme_id') ?? 1;
        $title = 'Payment Successful';

        return view('frontend.template-' . $templateId . '.paygate-success', compact(
            'title', 
            'order', 
            'secureTransaction'
        ));
    }

    /**
     * PayGate failure page
     */
    public function failed(Request $request)
    {
        $bookingId = $request->query('booking_id');
        
        $order = null;
        $secureTransaction = null;

        if ($bookingId) {
            $order = Order::where('order_number', $bookingId)->first();
            $secureTransaction = SecurePaymentTransaction::where('booking_id', $bookingId)
                ->where('status', 'failed')
                ->first();
        }

        $templateId = get_setting('theme_id') ?? 1;
        $title = 'Payment Failed';

        return view('frontend.template-' . $templateId . '.paygate-failed', compact(
            'title', 
            'order', 
            'secureTransaction'
        ));
    }
}
