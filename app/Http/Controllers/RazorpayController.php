<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Razorpay\Api\Api;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Activities;
use App\Models\Transport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class RazorpayController extends Controller
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
            if($request->type == 2){
                $total_amount = $request->total_with_tax;
            }else{
                $total_amount = $request->total_amount;
            }
            $customer_info = [
                'first_name' => $request->first_name ?? Auth::user()->fname,
                'last_name' => $request->last_name ?? Auth::user()->lname,
                'address' => $request->address ?? Auth::user()->address,
                'street_address' => $request->street_address ?? '',
                'postal_code' => $request->postal_code ?? '',
                'notes' => $request->notes ?? '',
                'phone' => $request->phone ?? '',
                'email' => $request->email ?? '',
                'services' => $request->services ?? '',
                'tax_amount' => $request->tax_amount ?? '',
                'tax_rate' => $request->tax_rate ?? '',
                'total_with_tax' => $request->total_with_tax ?? '',
                'type' => $request->type ?? 1,
                'current_url' => $request->current_url,
                'merchant_id' => $product->author_id ?? '',
                'total_amount' => $total_amount,
                
            ];
            

            Session::put('customer_info', $customer_info);

            $receiptId = Str::random(20);
            // Create an object of razorpay
            $api = new Api(get_payment_method('razorpay_key'), get_payment_method('razorpay_secret'));
            $main_amount = ($total_amount / (get_payment_method('razorpay_conversion') ?? 1));

            $main_amount = (int) $main_amount;
            $main_amount =  ($main_amount*100);

            $order = $api->order->create([
                'receipt' => $receiptId,
                'amount' => $main_amount,
                'currency' => 'INR',
            ]);

            $response = [
                'orderId' => $order['id'],
                'razorpayId' => get_payment_method('razorpay_key'),
                'amount' =>$main_amount,
                'name' => ($request->first_name . ' ' . $request->last_name) ?? (Auth::user()->fname . ' ' . Auth::user()->lname),
                'currency' => 'INR',
                'email' => $request->email ?? Auth::user()->email,
                'contactNumber' => $request->phone ?? Auth::user()->phone,
                'address' => $request->address ?? Auth::user()->address,
                'description' => 'Booking description',
            ];

            return $response;
        } catch (\Throwable $th) {
            return ['status' => false, 'message' => translate('Something Wrong')];
        }
    }

    /**
     * success
     *
     * @param  mixed $request
     * @return Response
     */
    public function success(Request $request)
    {
        try {
            $customer_info = Session::get('customer_info');
            $customer_cart = Session::get('customer_cart');
            if ($customer_info['type'] == 2) {
                if($customer_cart['product_type'] == 'tour'){
                    $products = Tour::findOrFail($customer_cart['product_id']);
                }elseif($customer_cart['product_type'] == 'hotel'){
                    $products = Hotel::findOrFail($customer_cart['product_id']);
                }elseif($customer_cart['product_type'] == 'activities'){
                    $products = Activities::findOrFail($customer_cart['product_id']);
                }elseif($customer_cart['product_type'] == 'transports'){
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
                $orders->tax_rate = $customer_info['tax_rate'];
                $orders->tax_amount = $customer_info['tax_amount'];
                $orders->total_with_tax = $customer_info['total_with_tax'];
                $orders->first_name = $customer_info['first_name'];
                $orders->last_name = $customer_info['last_name'];
                $orders->address = $customer_info['address'];
                $orders->street_address = $customer_info['street_address'];
                $orders->postal_code = $customer_info['postal_code'];
                $orders->phone = $customer_info['phone'];
                $orders->email = $customer_info['email'];
                $orders->notes = $customer_info['notes'];
                $orders->services = $customer_info['services'] ? json_encode($customer_info['services']) : NULL;
                $orders->merchant_id = $products->author_id;
                $orders->save();
            }

            return redirect()->route('thank_you')->with(['success' => translate('Booking successfully! Your Transaction ID is:') . $request->rzp_paymentid, 'orders' => $orders]);
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
        return redirect('checkout')->with('error', translate('Payment not Complete!'));
    }

}
