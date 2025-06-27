<?php

namespace App\Http\Controllers;

use App\Models\SecurePaymentTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurePaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'backend']);
    }

    /**
     * Display secure payment transactions
     */
    public function index(Request $request)
    {
        $query = SecurePaymentTransaction::with(['user', 'order'])
            ->orderBy('created_at', 'desc');

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter by payment method
        if ($request->has('payment_method') && $request->payment_method != '') {
            $query->where('payment_method', $request->payment_method);
        }

        // Search by booking ID or transaction ID
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('booking_id', 'like', "%{$search}%")
                  ->orWhere('transaction_id', 'like', "%{$search}%")
                  ->orWhere('external_transaction_id', 'like', "%{$search}%");
            });
        }

        $transactions = $query->paginate(20);

        $title = 'Secure Payment Transactions';
        return view('backend.secure-payments.index', compact('title', 'transactions'));
    }

    /**
     * Show transaction details
     */
    public function show($id)
    {
        $transaction = SecurePaymentTransaction::with(['user', 'order'])->findOrFail($id);
        $title = 'Transaction Details';
        return view('backend.secure-payments.show', compact('title', 'transaction'));
    }

    /**
     * Export transactions
     */
    public function export(Request $request)
    {
        $query = SecurePaymentTransaction::with(['user', 'order'])
            ->orderBy('created_at', 'desc');

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $transactions = $query->get();

        $filename = 'secure_payment_transactions_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($transactions) {
            $file = fopen('php://output', 'w');
            
            // CSV headers
            fputcsv($file, [
                'Transaction ID',
                'Booking ID',
                'User Email',
                'Amount',
                'Currency',
                'Status',
                'Payment Method',
                'External Transaction ID',
                'Created At',
                'Paid At'
            ]);

            // CSV data
            foreach ($transactions as $transaction) {
                fputcsv($file, [
                    $transaction->transaction_id,
                    $transaction->booking_id,
                    $transaction->user->email ?? '',
                    $transaction->amount,
                    $transaction->currency,
                    $transaction->status,
                    $transaction->payment_method,
                    $transaction->external_transaction_id,
                    $transaction->created_at->format('Y-m-d H:i:s'),
                    $transaction->paid_at ? $transaction->paid_at->format('Y-m-d H:i:s') : ''
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
