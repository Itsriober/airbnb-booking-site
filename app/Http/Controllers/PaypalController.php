<?php

namespace App\Http\Controllers;

use App\Models\User;
use Omnipay\Omnipay;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Activities;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PaypalController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(get_payment_method('paypal_key'));
        $this->gateway->setSecret(get_payment_method('paypal_secret'));
        $this->gateway->setTestMode(get_payment_method('paypal_mode'));
        $this->middleware(['auth', 'pverify']);
    }

    /**
     * submit
     *
     * @param  mixed $request
     * @return Response
     */
    public function submit($request)
    {

        if ($request->type == 2) {
            $total_amount = floatval(str_replace(',', '', $request->total_with_tax));
        } else {
            $total_amount = floatval(str_replace(',', '', $request->total_amount));
        }

        $customer_info = [
            'first_name' => $request->first_name ?? '',
            'last_name' => $request->last_name ?? '',
            'address' => $request->address ?? '',
            'street_address' => $request->street_address ?? '',
            'postal_code' => $request->postal_code ?? '',
            'notes' => $request->notes ?? '',
            'phone' => $request->phone ?? '',
            'email' => $request->email ?? '',
            'services' => $request->services ?? '',
            'tax_amount' => $request->tax_amount ?? '',
            'tax_rate' => $request->tax_rate ?? '',
            'total_with_tax' => floatval(str_replace(',', '', $request->total_with_tax)) ?? floatval(str_replace(',', '', $request->total_amount)),
            'type' => $request->type,
        ];
 

        Session::put('customer_info', $customer_info);
        $main_amount = ($total_amount / (get_payment_method('paypal_conversion') ?? 1));
    
        $response = $this->gateway->purchase([
            'amount' => number_format($main_amount, 2, '.', ''),
            'currency' => 'USD',
            'returnUrl' => url('/customer/paypal/' . $request->type . '/success'),
            'cancelUrl' => url('/customer/paypal/cancel'),
        ])->send();

        if ($response->isRedirect()) {
            $response->redirect();
        } else {
            return ['status' => false, 'message' => $response->getMessage()];
        }

    }

    /**
     * success
     *
     * @param  mixed $request
     * @param  int $type
     * @return Response
     */
    public function success(Request $request, $type)
    {
        try{
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ]);
            $response = $transaction->send();
        
            $customer_info = Session::get('customer_info');
            $customer_cart = Session::get('customer_cart');
            if ($type == 2) {
                if ($customer_cart['product_type'] == 'tour') {
                    $product  = Tour::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'hotel') {
                    $product  = Hotel::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'activities') {
                    $product  = Activities::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'transports') {
                    $product  = Transport::findOrFail($customer_cart['product_id']);
                }

                $adult_unit_price_amount = $customer_cart['adult_unit_sale_price'] ? $customer_cart['adult_unit_sale_price'] : $customer_cart['adult_unit_price'];
                $total_amount = $customer_cart['total_amount'];
                $adult_unit_price = $adult_unit_price_amount;
                $adult_total_price = $customer_cart['price'];
                $child_unit_price = $customer_cart['child_unit_price'];
                $child_total_price = $customer_cart['child_price'];
                $start_date = $customer_cart['start_date'] ?? '';
                $end_date = $customer_cart['end_date'] ?? '';
                $days = $customer_cart['days'] ?? '';
                $total_with_tax = $customer_info['total_with_tax'];
            }
            if ($response->isSuccessful()) {
                $arr = $response->getData();
                if ($type == 2) {
                    $orders = new Order;
                    $orders->order_number = random_number();
                    $orders->product_id = $customer_cart['product_id'];
                    $orders->product_type = $customer_cart['product_type'];
                    $orders->transport_type = $customer_cart['transport_type'];
                    $orders->user_id = Auth::user()->id;
                    $orders->first_name = $customer_info['first_name'];
                    $orders->last_name = $customer_info['last_name'];
                    $orders->address = $customer_info['address'];
                    $orders->street_address = $customer_info['street_address'];
                    $orders->postal_code = $customer_info['postal_code'];
                    $orders->phone = $customer_info['phone'];
                    $orders->email = $customer_info['email'];
                    $orders->notes = $customer_info['notes'];
                    $orders->merchant_id = $product->author_id;
                    $orders->adult_unit_price = $adult_unit_price;
                    $orders->adult_total_price = $adult_total_price;
                    $orders->child_unit_price = $child_unit_price;
                    $orders->child_total_price = $child_total_price;
                    $orders->total_amount = $total_amount;
                    $orders->tax_rate = get_setting('tax_rate') ?? 0;
                    $orders->tax_amount = $customer_info['tax_amount'] ?? 0;
                    $orders->total_with_tax = (int)$total_with_tax ?? 0;
                    $orders->adult_qty = $customer_cart['quantity'];
                    $orders->child_qty = $customer_cart['child_qty'];
                    $orders->services = $customer_info['services'] ? json_encode($customer_info['services']) : NULL;
                    $orders->save();
                }
                $payment = new Wallet;
                $payment->transaction_id = $arr['id'];
                $payment->user_id = Auth::user()->id;
                if ($request->type == 2) {
                    $payment->order_id = $orders->id ?? null;
                }
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->gateway_amount = $arr['transactions'][0]['amount']['total'];
                $payment->type = $type;
                if ($type == 2) {
                    $admin_commission_rate = $product->users?->admin_commission ?? get_setting('merchant_commission');
                    $payment_rate = 100 - ($admin_commission_rate ?? 0);
                    $merchant_amount = $total_amount / 100 * $payment_rate;
                    $payment->merchant_amount = $merchant_amount;
                    $payment->admin_commission_rate = ($admin_commission_rate ?? 0);
                    $admin_commission = $total_amount - $merchant_amount;
                    $payment->admin_commission = $admin_commission;


                    if ($type == 2) {
                        if ($product->users?->role == 2) {
                            User::findOrFail($product->author_id)->increment('wallet_balance', (int)$merchant_amount);
                        }
                        $admin = User::where('role', 4)->orderBy('id', 'asc')->first();
                        $admin->increment('wallet_balance', (int)$admin_commission);
                    }
                }
                if ($type == 1) {
                    $payment->payment_details = 'Deposit to Wallet';
                } elseif ($type == 2) {
                    $payment->payment_details = $customer_cart['product_type'] . ' Booking Payment';
                } elseif ($type == 4) {
                    $payment->payment_details = 'Withdraw from Wallet';
                }
                $payment->amount = $customer_cart['total_amount'] ?? $customer_info['total_with_tax'];
                $payment->tax_amount = $customer_info['tax_amount'] ?? 0;
                $payment->total_amount = $customer_info['total_with_tax'];
                $payment->payment_method = 'paypal';
                $payment->currency = $arr['transactions'][0]['amount']['currency'];
                $payment->status = 2;
                $payment->save();
                if ($type == 1) {
                    Auth::user()->increment('wallet_balance', $arr['transactions'][0]['amount']['total']);
                    email_send('deposit', Auth::user()->email);
                    Session::forget($customer_info);
                    return redirect()->route('customer.deposit')->with('success', translate('Deposit successfully! Your Transaction ID is:') . $arr['id']);
                } elseif ($type == 2) {
                    email_send('booking_mail', Auth::user()->email);
                    return redirect()->route('thank_you')->with(['success' => translate('Booking successfully! Your Transaction ID is:') . $arr['id'], 'orders' => $orders]);
                }
            } else {
                return redirect()->back()->with('error', $response->getMessage());
            }
        } else {
            return redirect()->back()->with('error', translate('Your Transection is declined'));
        }
    } catch (\Throwable $th) {
        $templateId = get_setting('theme_id') ?? 1;
        return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => 'en']);

    }
    }

    /**
     * error
     *
     * @return Response
     */
    public function error()
    {
        return redirect()->back()->with('error', translate('Payment not Complete!'));
    }
}
