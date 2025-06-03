<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;
use App\Models\Hotel;
use App\Models\Activities;
use App\Models\Tour;
use App\Models\Transport;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    /**
     * submit
     *
     * @param  mixed $request
     * @return Response
     */
    public function submit($request)
    {

        try {
            if ($request->type == 2) {
                $customer_cart = Session::get('customer_cart');
                $total_amount = floatval(str_replace(',', '', $request->total_with_tax));
            }else{
                $total_amount = floatval(str_replace(',', '', $request->total_amount));
            }

            $currency = get_setting('default_currency');
            $token = $request->stripeToken;
            Stripe\Stripe::setApiKey(get_payment_method('stripe_secret'));

            $main_amount = ($total_amount / (get_payment_method('stripe_conversion') ?? 1));
            $main_amount = ($main_amount * 100);
            $main_amount = (int)$main_amount;
            if ($request->type == 1) {
                $response = Stripe\Charge::create([
                    'amount' => $main_amount,
                    'currency' => 'USD',
                    'source' => $request->stripeToken,
                ]);
            } elseif ($request->type == 2) {

                $customer = Stripe\Customer::create([

                    'address' => [
                        'line1' => $request->address,
                        'postal_code' => $request->postal_code,
                        'city' => $request->street_address,
                    ],
                    'email' => $request->email,
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'source' => $request->stripeToken,
                ]);

                $response = Stripe\Charge::create([
                    'amount' => $main_amount,
                    'currency' => 'USD',
                    'customer' => $customer->id,
                    'shipping' => [
                        'name' => $request->first_name . ' ' . $request->last_name,
                        'address' => [
                            'line1' => $request->address,
                            'postal_code' => $request->postal_code,
                            'city' => $request->street_address,
                        ],

                    ],

                ]);
            }

            if ($request->type == 2) {

                if ($customer_cart['product_type'] == 'tour') {
                    $products = Tour::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'hotel') {
                    $products = Hotel::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'activities') {
                    $products = Activities::findOrFail($customer_cart['product_id']);
                } elseif ($customer_cart['product_type'] == 'transports') {
                    $products = Transport::findOrFail($customer_cart['product_id']);
                }
                $orders = new Order;
                $orders->order_number = random_number();
                $orders->start_date = $customer_cart['start_date'] ?? '';
                $orders->end_date = $customer_cart['end_date'] ?? '';
                $orders->days = $customer_cart['days'] ?? '';
                $orders->product_id = $customer_cart['product_id'];
                $orders->product_type = $customer_cart['product_type'];
                $orders->transport_type = $customer_cart['transport_type'];
                $orders->user_id = Auth::user()->id;
                $orders->adult_unit_price = $customer_cart['adult_unit_sale_price'] ? $customer_cart['adult_unit_sale_price'] : $customer_cart['adult_unit_price'];
                $orders->adult_qty = $customer_cart['quantity'];
                $orders->adult_total_price = $customer_cart['price'];
                $orders->child_unit_price = $customer_cart['child_unit_price'];
                $orders->child_qty = $customer_cart['child_qty'];
                $orders->child_total_price = $customer_cart['child_price'];
                $orders->total_amount = $customer_cart['total_amount'];
                $orders->tax_rate = $request->tax_rate;
                $orders->tax_amount = $request->tax_amount;
                $orders->total_with_tax = $total_amount;
                $orders->first_name = $request->first_name;
                $orders->last_name = $request->last_name;
                $orders->address = $request->address;
                $orders->street_address = $request->street_address;
                $orders->postal_code = $request->postal_code;
                $orders->phone = $request->phone;
                $orders->email = $request->email;
                $orders->notes = $request->notes;
                $orders->services = $request->services ? json_encode($request->services) : NULL;
                $orders->merchant_id = $products->author_id;
                $orders->save();
            }

            $payment = new Wallet;
            $payment->transaction_id = $response->id;
            $payment->user_id = Auth::user()->id;
            if ($request->type == 2) {
                $payment->order_id = $orders->id ?? null;
            }
            $payment->payer_id = $response->id;
            $payment->payer_email = $request->email ?? Auth::user()->email;
            $payment->type = $request->type;
            $payment->gateway_amount = $response->amount / 100;
            if ($request->type == 2) {
                $admin_commission_rate = $products->users?->admin_commission ?? get_setting('merchant_commission');
                $payment_rate = 100 - ($admin_commission_rate ?? 0);
                $merchant_amount = ($customer_cart['total_amount'] / 100) * $payment_rate;
                $payment->merchant_amount = $merchant_amount;
                $payment->admin_commission_rate = ($admin_commission_rate ?? 0);
                $admin_commission = $customer_cart['total_amount'] - $merchant_amount;
                $payment->admin_commission = $admin_commission;
                if ($products->users?->role == 2) {
                    User::findOrFail($products->author_id)->increment('wallet_balance', $merchant_amount);
                }
                $admin = User::where('role', 4)->orderBy('id', 'asc')->first();
                $admin->increment('wallet_balance', $admin_commission);
            }
            if ($request->type == 1) {
                $payment->payment_details = 'Deposit to Wallet';
                $payment->amount = $total_amount;
            } elseif ($request->type == 2) {
                $payment->payment_details =  $customer_cart['product_type'] . ' Order Payment';
                $payment->amount = $customer_cart['total_amount'];
            }
           
            $payment->tax_amount = $request->tax_amount ?? 0;
            $payment->total_amount = $total_amount;
            $payment->payment_method = 'stripe';
            $payment->currency = $response->currency;
            $payment->status = 2;
            $payment->save();
            return $response;
        } catch (\Throwable $th) {
            $templateId = get_setting('theme_id') ?? 1;
            return view('frontend.errors.index', ['templateId' => $templateId, 'lang' => 'en']);
        }
    }
}
