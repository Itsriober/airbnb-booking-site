<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Activities;
use App\Models\Transport;
use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

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
                $wallets = Wallet::where('payer_id', $result->id)->first();
                $orders = $wallets->order_id;
                if ($request->type == 1) {
                    Auth::user()->increment('wallet_balance', $request->amount);
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
        } elseif ($request->payment_method == 'wallet') {

            $adult_unit_price_amount = $customer_cart['adult_unit_sale_price'] ? $customer_cart['adult_unit_sale_price'] : $customer_cart['adult_unit_price'];
            $amount = $customer_cart['total_amount'];
            $adult_unit_price = $adult_unit_price_amount;
            $adult_total_price = $customer_cart['price'];
            $child_unit_price = $customer_cart['child_unit_price'];
            $child_total_price = $customer_cart['child_price'];
            $start_date = $customer_cart['start_date'] ?? '';
            $end_date = $customer_cart['end_date'] ?? '';
            $days = $customer_cart['days'] ?? '';
            $total_amount = floatval(str_replace(',', '', $request->total_with_tax));

            if (Auth::user()->wallet_balance >= $total_amount) {
                $currency = Currency::findOrFail(get_setting('default_currency'));
                $receiptId = Str::random(20);
          
                if ($request->type == 2) {
                    $orders = new Order;
                    $orders->order_number = random_number();
                    $orders->start_date = $start_date;
                    $orders->end_date = $end_date;
                    $orders->days = $days;
                    $orders->product_id = $customer_cart['product_id'];
                    $orders->product_type = $customer_cart['product_type'];
                    $orders->transport_type = $customer_cart['transport_type'];
                    $orders->user_id = Auth::user()->id;
                    $orders->adult_unit_price = $adult_unit_price;
                    $orders->adult_total_price = $adult_total_price;
                    $orders->child_unit_price = $child_unit_price;
                    $orders->child_total_price = $child_total_price;
                    $orders->total_amount = $amount;
                    $orders->tax_rate = get_setting('tax_rate') ?? 0;
                    $orders->tax_amount = $request->tax_amount;
                    $orders->total_with_tax = $total_amount;
                    $orders->adult_qty = $customer_cart['quantity'];
                    $orders->child_qty = $customer_cart['child_qty'];
                    $orders->first_name = $request->first_name;
                    $orders->last_name = $request->last_name;
                    $orders->address = $request->address;
                    $orders->street_address = $request->street_address;
                    $orders->postal_code = $request->postal_code;
                    $orders->phone = $request->phone;
                    $orders->email = $request->email;
                    $orders->notes = $request->notes;
                    $orders->merchant_id = $product->author_id;
                    $orders->services = $request->services ? json_encode($request->services) : NULL;
                    $orders->save();
                }

                $payment = new Wallet;
                $payment->transaction_id = $receiptId;
                $payment->user_id = Auth::user()->id;
                if ($request->type == 2) {
                    $payment->order_id = $orders->id ?? null;
                }
                $payment->payer_id = $receiptId;
                $payment->payer_email = $request->email ?? Auth::user()->email;
                $payment->type = $request->type;
                $payment->gateway_amount = $total_amount;
                if ($request->type == 2) {
                    $admin_commission_rate = $product->users?->admin_commission ?? get_setting('merchant_commission');
                    $payment_rate = 100 - ($admin_commission_rate ?? 0);

                    $merchant_amount = ($amount / 100) * $payment_rate;
                    $admin_commission = $amount - $merchant_amount;
                    $payment->merchant_amount = $merchant_amount;
                    $payment->admin_commission_rate = ($admin_commission_rate ?? 0);
                    $payment->admin_commission = $admin_commission;

                    Auth::user()->decrement('wallet_balance', $total_amount);
                    if ($request->type == 2) {
                        if ($product->users?->role == 2) {
                            User::findOrFail($product->author_id)->increment('wallet_balance', $merchant_amount);
                        }
                        $admin = User::where('role', 4)->orderBy('id', 'asc')->first();
                        $admin->increment('wallet_balance', $admin_commission);
                    }
                }

                if ($request->type == 1) {
                    $payment->payment_details = 'Deposit to Wallet';
                } elseif ($request->type == 2) {
                    $payment->payment_details = $customer_cart['product_type'] . ' Booking Payment';
                } elseif ($request->type == 4) {
                    $payment->payment_details = 'Withdraw from Wallet';
                }
                $payment->amount = $amount;
                $payment->tax_amount = $request->tax_amount;
                $payment->total_amount = $total_amount;
                $payment->payment_method = 'wallet';
                $payment->currency = $currency->code ?? 'USD';
                $payment->status = 2;
                $payment->save();
        
                if ($request->type == 2) {
       
                    email_send('booking_mail', Auth::user()->email);
              
                    return redirect()->route('thank_you')->with(['success' => translate('Booking successfully! Your Transaction ID is:') . $receiptId, 'orders' => $orders]);
                } elseif ($request->type == 3) {
                    Product::findOrFail($request->product_id)->decrement('quantity', $request->quantity);
                    email_send('order_mail', Auth::user()->email);
                    return redirect()->route('thank_you')->with(['success' => translate('Order successfully! Your Transaction ID is:') . $receiptId, 'orders' => $orders]);
                } elseif ($request->type == 7) {
                    $orders = Order::findOrFail($request->order_id);
                    $orders->payment_status = 3;
                    $orders->update();
                    email_send('final_payment', Auth::user()->email);
                    return redirect()->route('customer.bid')->with('success', translate('Final Payment successfully! Your Transaction ID is:') . $receiptId);
                }
            } else {
                return redirect()->back()->with('error', translate('Your Balance not sufficient. Please deposit.'));
            }
        }

    }
}
