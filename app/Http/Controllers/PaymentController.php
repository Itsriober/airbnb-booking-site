<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Activities;
use App\Models\Transport;
use App\Models\Currency;
use App\Models\SecurePaymentTransaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'pverify']);
    }
    /**
     * customer_payment
     *
     * @param  mixed $request
     * @return Response
     */
    public static function customer_payment(Request $request)
    {
        if ($request->type == 2) {
            $customer_cart = Session::get('customer_cart');
            if ($customer_cart['product_type'] == 'tour') {
                $product  = Tour::findOrFail($customer_cart['product_id']);
            } elseif ($customer_cart['product_type'] == 'hotel') {
                $product  = Hotel::findOrFail($customer_cart['product_id']);
            } elseif ($customer_cart['product_type'] == 'activities') {
                $product  = Activities::findOrFail($customer_cart['product_id']);
            } elseif ($customer_cart['product_type'] == 'transports') {
                $product  = Transport::findOrFail($customer_cart['product_id']);
            }
        }

    
        if ($request->payment_method == null) {
            return redirect()->back()->with('error', translate('Select Payment Method.'));
        }

        if ($request->payment_method == 'stripe') {
            $stripe_amount = $request->total_with_tax ?? $request->total_amount;
            if ($stripe_amount < (get_payment_method('stripe_conversion') / 2)) {
                return redirect()->back()->with('error', translate('Total Amount is low for stripe payment'));
            }
        }

        if ($request->type == 2) {
            $userSingle = Auth::user();
            /** Validation */
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'address' => 'required|max:255',
                'street_address' => 'nullable|max:255',
                'postal_code' => 'nullable|max:255',
                'phone' => 'required|max:255',
                'email' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($userSingle->address == null) {
                $userSingle->address = $request->address;
            }
            if ($userSingle->zip_code == null) {
                $userSingle->zip_code = $request->postal_code;
            }
            if ($userSingle->phone == null) {
                $userSingle->phone = $request->phone;
            }
            $userSingle->update();
        }

        if ($request->payment_method == 'paypal') {
            $result = (new PaypalController)->submit($request);
            if (isset($result['status'])) {
                return redirect()->back()->with('error', $result['message']);
            }
        } elseif ($request->payment_method == 'stripe') {

            try {
                $result = (new StripeController)->submit($request);
             
                if (isset($result['status']) && $result['status'] != 'succeeded') {
                    return redirect()->back()->with('error', $result['message']);
                }
                if ($request->type == 1) {
                    email_send('deposit', Auth::user()->email);

                    return redirect()->back()->with('success', translate('Deposit successfully! Your Transaction ID is:') . $result->id);
                } elseif ($request->type == 2) {
                
                    email_send('booking_mail', Auth::user()->email);
                    return redirect()->route('thank_you')->with(['success' => translate('Order successfully! Your Transaction ID is:') . $result->id, 'orders' => $orders]);
                }
            } catch (\Throwable $th) {

                return redirect()->back()->with('error', $th->getMessage());
            }
        } elseif ($request->payment_method == 'razorpay') {
      
            $response = (new RazorpayController)->submit($request);
            if (isset($response['status'])) {
                return redirect()->back()->with('error', $response['message']);
            } else {
                $templateId = get_setting('theme_id') ?? 1;
                $title = 'RazorPay Payment';
                return view('frontend.template-' . $templateId . '.razorpay', compact('title', 'response'));
            }
        } elseif ($request->payment_method == 'crypto') {
            try {
                // Create order first
                $orders = $this->createOrder($request);
                
                if (!$orders) {
                    return redirect()->back()->with('error', 'Failed to create order. Please try again.');
                }

                $order = $orders; // Assuming createOrder returns a single order
                
                // Create secure payment transaction
                $secureTransaction = SecurePaymentTransaction::createFromOrder($order);
                
                // Prepare data for redirect to checkout.harmostays.com
                $user = Auth::user();
                $amount = $request->total_with_tax ?? $request->total_amount;
                $currency = get_setting('currency_code', 'USD');
                $callback = route('paygate.callback');
                
                $params = [
                    'booking_id' => $order->order_number,
                    'user_id'    => $user->id,
                    'name'       => $user->fname . ' ' . $user->lname,
                    'email'      => $user->email,
                    'amount'     => $amount,
                    'currency'   => $currency,
                    'callback'   => $callback,
                ];
                
                // Add signature for security
                $secret = config('services.paygate.secret');
                if (!$secret) {
                    throw new \Exception('PayGate secret key not configured. Please set PAYGATE_SECRET in your .env file.');
                }
                $params['signature'] = hash_hmac('sha256', http_build_query($params), $secret);
                
                // Update secure transaction with external reference
                $secureTransaction->update([
                    'transaction_id' => 'TXN_' . $order->order_number . '_' . time(),
                    'signature' => $params['signature']
                ]);
                
                Log::info('PayGate Redirect', [
                    'booking_id' => $order->order_number,
                    'amount' => $amount,
                    'user_id' => $user->id
                ]);
                
                $url = 'https://checkout.harmostays.com/checkout?' . http_build_query($params);
                return redirect()->away($url);
                
            } catch (\Exception $e) {
                Log::error('PayGate Payment Error', [
                    'error' => $e->getMessage(),
                    'user_id' => Auth::id()
                ]);
                return redirect()->back()->with('error', 'Payment processing failed. Please try again.');
            }
        }

    }

    /**
     * Create order from request data
     */
    private function createOrder(Request $request)
    {
        $customer_cart = Session::get('customer_cart');
        $user = Auth::user();

        if (!$customer_cart) {
            throw new \Exception('Cart data not found');
        }

        // Get product based on type
        if ($customer_cart['product_type'] == 'tour') {
            $product = Tour::findOrFail($customer_cart['product_id']);
        } elseif ($customer_cart['product_type'] == 'hotel') {
            $product = Hotel::findOrFail($customer_cart['product_id']);
        } elseif ($customer_cart['product_type'] == 'activities') {
            $product = Activities::findOrFail($customer_cart['product_id']);
        } elseif ($customer_cart['product_type'] == 'transports') {
            $product = Transport::findOrFail($customer_cart['product_id']);
        } else {
            throw new \Exception('Invalid product type');
        }

        // Create order
        $order = new Order();
        $order->user_id = $user->id;
        $order->merchant_id = $product->user_id ?? 1;
        $order->start_date = $customer_cart['start_date'] ?? null;
        $order->end_date = $customer_cart['end_date'] ?? null;
        $order->days = $customer_cart['days'] ?? null;
        $order->order_number = 'ORD-' . time() . '-' . rand(1000, 9999);
        $order->product_id = $customer_cart['product_id'];
        $order->product_type = $customer_cart['product_type'];
        $order->transport_type = $customer_cart['transport_type'] ?? null;
        $order->adult_unit_price = $customer_cart['adult_unit_price'] ?? 0;
        $order->adult_qty = $customer_cart['quantity'] ?? 0;
        $order->adult_total_price = $customer_cart['adult_price'] ?? 0;
        $order->child_unit_price = $customer_cart['child_unit_price'] ?? 0;
        $order->child_qty = $customer_cart['child_qty'] ?? 0;
        $order->child_total_price = $customer_cart['child_price'] ?? 0;
        $order->services = isset($request->services) ? json_encode($request->services) : null;
        $order->total_amount = $customer_cart['total_amount'] ?? 0;
        $order->tax_rate = $request->tax_rate ?? 0;
        $order->tax_amount = $request->tax_amount ?? 0;
        $order->total_with_tax = $request->total_with_tax ?? 0;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->street_address = $request->street_address;
        $order->postal_code = $request->postal_code;
        $order->notes = $request->notes;
        $order->status = 1; // Pending
        $order->payment_status = 2; // Unpaid
        $order->save();

        return $order;
    }
}
