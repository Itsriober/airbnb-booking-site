<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Wallet;
use App\Models\Product;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MerchantPaymentInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{

    /**
     * Show the application admin dashboard.
     */

    public function index()
    {
        $user       = Auth::user();
        $page_title = translate('Dashboard');
        if ($user->role == 2) {

            $user_customers        = Order::where('merchant_id', $user->id)->groupBy('user_id')->pluck('user_id');

            $data['total_amount']       = $this->walletMultiTypeByStatus($type = 2, $status = 2, $author = $user->id);
            $data['total_tax']          = $this->taxMultiTypeByStatus($type = 2, $status = 2, $userType = $user->id);
            $data['total_withdraw'] = Wallet::where('type', 4)->where('user_id', $user->id)->where('status', 2)->sum('amount');
            $data['depositReports']     = $this->transitionReport($status = 2, $type = 1);
            $data['widthdrawReports']   = $this->transitionReport($status = 2, $type = 3);

            $data['depositReports']   = $this->transitionReport($status = 2, $type = 1);
            $data['widthdrawReports'] = $this->transitionReport($status = 2, $type = 3);

            $productSettingReport = $this->productSellingReport();

            $data['tourOrderReports'] = $this->orderTypeSales($merchant = $user->id, $orderStatus = 3,$type='tour');
            $data['hotelOrderReports'] = $this->orderTypeSales($merchant = $user->id, $orderStatus = 3,$type='hotel');
            $data['activitiesOrderReports'] = $this->orderTypeSales($merchant = $user->id, $orderStatus = 3,$type='activities');
            $data['transportOrderReports'] = $this->orderTypeSales($merchant = $user->id, $orderStatus = 3,$type='transport');
            $data['orderSummeries']       = $this->orderSummeryReport($merchant = $user->id);


            $booking = Order::where('merchant_id', $user->id)->latest()->take(12)->get();
        } else {

            $data['total_amount']       = $this->walletMultiTypeByStatus($type = 2, $status = 2, $author = null);
            $data['total_tax']          = $this->taxMultiTypeByStatus($type = 2, $status = 2, $userType = null);
            $data['total_deposit'] = Wallet::where('type', 1)->where('status',2)->sum('total_amount');
            $data['total_withdraw']  = Wallet::where('type', 4)->where('status',2)->sum('amount');
            $data['total_profits']      = Wallet::where('status', 2)->sum('admin_commission');
            $data['depositReports']     = $this->transitionReport($status = 2, $type = 1);
            $data['widthdrawReports']   = $this->transitionReport($status = 2, $type = 3);

            $productSettingReport = $this->productSellingReport();

            $data['tourOrderReports'] = $this->orderTypeSales(null, $orderStatus = 3,$type='tour');
            $data['hotelOrderReports'] = $this->orderTypeSales(null, $orderStatus = 3,$type='hotel');
            $data['activitiesOrderReports'] = $this->orderTypeSales(null, $orderStatus = 3,$type='activities');
            $data['transportOrderReports'] = $this->orderTypeSales(null, $orderStatus = 3,$type='transport');
            $data['orderSummeries']       = $this->orderSummeryReport(null);
            $data['customers']            = $this->userSummeryReport($type = 1, $status = 1);
            $data['merchants']            = $this->userSummeryReport($type = 2, $status = 1);
            $booking = Order::latest()->take(12)->get();
        }


        $data['total_customers'] = User::where('role', 1)->count();
        $data['total_agents'] = User::where('role', 2)->count();
        return view('backend.dashboard.index', compact('page_title', 'productSettingReport', 'data','booking'));
    }


    /**
     * profile
     *
     * @return view
     */
    public function profile()
    {
        $userSingle = Auth::user();
        if ($userSingle->role == 2) {
            $page_title = translate('User Profile');
        } else {
            $page_title = translate('Admin Profile');
        }
        $merchant_payment = MerchantPaymentInfo::where('user_id', $userSingle->id)->get();
        $countries        = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.dashboard.profile', compact('page_title', 'userSingle', 'countries', 'merchant_payment'));
    }


    /**
     * profile_update
     *
     * @param  mixed $request
     * @param  int   $id
     * @return Response
     */
    public function profile_update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        /** Validation */
        $validator = Validator::make(
            $request->all(),
            [
                'fname'      => 'required|max:255',
                'lname'      => 'required|max:255',
                'email'      => 'required|max:255|unique:users,email,' . $users->id,
                'phone'      => 'required|max:255|unique:users,phone,' . $users->id,
                'username'   => 'required|max:255|unique:users,username,' . $users->id,
                'address'    => 'required|max:255',
                'country_id' => 'required|max:255',
                'state_id'   => 'required|max:255',
                'city_id'    => 'required|max:255',
                'zip_code'   => 'required|max:255',
                'image'      => 'nullable|image',
            ]
        );

        if ($request->password) {
            $validator = Validator::make($request->all(), [
                'password'   => 'required|confirmed|min:8',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        /** image upload */
        $image = $request->file('image');
        if ($image != '') {
            if ($users->image && file_exists(public_path('uploads/users/' . $users->image))) {
                unlink(public_path('uploads/users/' . $users->image));
            }
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users'), $image_name);
            $users->image = $image_name;
        }
        $users->fname      = $request->fname;
        $users->lname      = $request->lname;
        $users->address    = $request->address;
        $users->username   = $request->username;
        $users->email      = $request->email;
        $users->phone      = $request->phone;
        $users->country_id = $request->country_id;
        $users->state_id   = $request->state_id;
        $users->city_id    = $request->city_id;
        $users->zip_code   = $request->zip_code;

        if ($request->password) {
            $users->password = Hash::make($request->password);
        }
        $users->update();


        if ($users->role == 2) {
            $this->merchantPaymentInfo($request, $id);
        }


        return redirect()->back()->with('success', translate('Your profile has been updated successfully'));
    }


    /**
     * shop
     *
     * @return view
     */
    public function shop()
    {
        $userSingle = Auth::user();
        $shopSingle = Store::where('author_id', $userSingle->id)->first();
        $page_title = translate('My Agency');
        $countries  = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.dashboard.shop', compact('page_title', 'shopSingle', 'countries'));
    }


    /**
     * shop_update
     *
     * @param  mixed $request
     * @return Response
     */
    public function shop_update(Request $request)
    {
        $shop      = $request->shop_id ? Store::findOrFail($request->shop_id) : new Store();
        $validator = Validator::make(
            $request->all(),
            array(
                'name'           => isset($request->shop_id) ? 'required|max:255|unique:stores,name,' . $shop->id : 'required|max:255|unique:stores,name',
                'shop_email'     => 'nullable|max:255',
                'shop_phone'     => 'nullable|max:255',
                'shop_address'   => 'nullable|max:255',
                'shop_logo'      => 'nullable',
                'cover_img'      => 'nullable',
                'facebook_link'  => 'nullable|max:255',
                'twitter_link'   => 'nullable|max:255',
                'linkedin_link'  => 'nullable|max:255',
                'instagram_link' => 'nullable|max:255',
                'pinterest_link' => 'nullable|max:255',
                'youtube_link'   => 'nullable|max:255',
            )
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        /** Shop Logo upload */
        $shop_logo = $request->file('shop_logo');
        if ($shop_logo != '') {
            if ($shop->logo && file_exists(public_path('uploads/shop/' . $shop->logo))) {
                unlink(public_path('uploads/shop/' . $shop->logo));
            }
            $shop_logo_name = pathinfo($shop_logo->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $shop_logo->getClientOriginalExtension();
            $shop_logo->move(public_path('uploads/shop'), $shop_logo_name);
            $shop->logo = $shop_logo_name;
        }
        /** Shop Cover Image upload */
        $cover_img = $request->file('cover_img');
        if ($cover_img != '') {
            if (file_exists(public_path('uploads/shop/' . $shop->cover_img))) {
                unlink(public_path('uploads/shop/' . $shop->cover_img));
            }
            $cover_img_name = pathinfo($cover_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $cover_img->getClientOriginalExtension();
            $cover_img->move(public_path('uploads/shop'), $cover_img_name);
            $shop->cover_img = $cover_img_name;
        }
        $shop->name      = $request->name;
        $shop->slug      = Str::slug($request->name);
        $shop->author_id = Auth::user()->id;
        $shop->email     = $request->shop_email;
        $shop->phone     = $request->shop_phone;
        $shop->address   = $request->shop_address;
        $shop->facebook  = $request->facebook_link;
        $shop->twitter   = $request->twitter_link;
        $shop->linkedin  = $request->linkedin_link;
        $shop->instagram = $request->instagram_link;
        $shop->pinterest = $request->pinterest_link;
        $shop->youtube   = $request->youtube_link;
        $shop->save();

        return redirect()->back()->with('success', translate('Your agency has been updated successfully'));
    }


    /**
     * transaction
     *
     * @return View
     */
    public function transaction()
    {
        $page_title = translate('Transactions');
        $user       = Auth::user();
        if ($user->role == 2) {
            $transactions = Wallet::where('user_id', $user->id)->latest()->paginate(15);
        } else {
            $transactions = Wallet::latest()->paginate(15);
        }
        return view('backend.dashboard.transaction', compact('page_title', 'transactions'));
    }

    public function order(Request $request)
    {
        $page_title = translate('Booking Info');
        $user       = Auth::user();
        if ($user->role == 2) {
            $orders = Order::where('merchant_id', $user->id)->when($request->search, function ($q) use ($request) {
                return $q->where('order_number', 'like', '%' . $request->search . '%')
                    ->orWhere('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('total_with_tax', 'like', '%' . $request->search . '%');
            })->latest()->paginate(12);

            $data['total_orders']            = Order::where('merchant_id', $user->id)->count();
            $data['total_orders_pending']    = Order::where('merchant_id', $user->id)->where('status', 1)->count();
            $data['total_orders_processing'] = Order::where('merchant_id', $user->id)->where('status', 2)->count();
            $data['total_orders_approved']   = Order::where('merchant_id', $user->id)->where('status', 3)->count();
            $data['total_orders_cancel']   = Order::where('merchant_id', $user->id)->where('status', 4)->count();
        } else {
            $orders = Order::when($request->search, function ($q) use ($request) {
                return $q->where('order_number', 'like', '%' . $request->search . '%')
                    ->orWhere('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('total_with_tax', 'like', '%' . $request->search . '%');
            })->latest()->paginate(12);

            $data['total_orders']            = Order::count();
            $data['total_orders_pending']    = Order::where('status', 1)->count();
            $data['total_orders_processing'] = Order::where('status', 2)->count();
            $data['total_orders_approved']   = Order::where('status', 3)->count();
            $data['total_orders_cancel']   = Order::where('status', 4)->count();
        }

        return view('backend.orders.index', compact('page_title', 'orders', 'data'));
    }

    public function order_details($id)
    {
        $page_title = translate('Booking Info');

        $order = Order::findOrfail($id);

        return view('backend.orders.details', compact('page_title', 'order'));
    }

    public function changeStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'status_id' => 'required|in:1,2,3,4',
        ]);

        $order = Order::findOrFail($request->order_id);

        // Update the status
        $order->status = $request->status_id;
        $order->save();

        return redirect()->back()->with('success', translate('Booking status updated successfully.'));
    }


    /**
     * depositMonthlyReport
     *
     * @param  mixed $status
     * @return Response
     */
    public function transitionReport($status, $type)
    {
        return Wallet::select(
            DB::raw('SUM(amount) as total_amount'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as monthsYears")
        )
            ->where('status', $status)
            ->where('type', $type)
            ->groupBy('monthsYears')
            ->get();
    }


    /**
     * depositMonthlyReport
     *
     * @param  mixed $status
     * @return Response
     */
    public function productSellingReport()
    {
        return Order::select(
            DB::raw('count(*) as total'),
            DB::raw("DATE_FORMAT(created_at,'%d %M %Y') as monthsYears")
        )
            ->groupBy('monthsYears')
            ->get();
    }

    /**
     * orderTypeSales
     *
     * @param  mixed $product
     * @param  int   $orderType
     * @param  int   $orderStatus
     * @return Response
     */

    public function orderTypeSales($merchant = null, $orderStatus, $type)
    {

        $order = Order::select(
            DB::raw('SUM(adult_qty) as quantity'),
            DB::raw('SUM(total_amount) as amount'),
            DB::raw("DATE_FORMAT(created_at,'%d %M %Y') as monthsYears")
        )
            ->where('status', $orderStatus);
        if (!empty($merchant)) {
            return $order->where('merchant_id', $merchant)
                ->where('product_type', $type)
                ->groupBy('monthsYears')
                ->get();
        } else {
            return $order->where('product_type', $type)
                ->groupBy('monthsYears')
                ->get();
        }
    }

    /**
     * orderSummeryReport
     *
     * @param  Object $product
     * @return Response
     */
    public function orderSummeryReport($merchant = null)
    {

        $order = Order::select(
            DB::raw('SUM(adult_qty) as quantity'),
            DB::raw("DATE_FORMAT(created_at,'%d %M %Y') as monthsYears")
        );

        if (!empty($merchant)) {
            return $order->where('merchant_id', $merchant)
                ->groupBy('monthsYears')
                ->get();
        } else {
            return $order
                ->groupBy('monthsYears')
                ->get();
        }
    }

    /**
     * userSummeryReport
     *
     * @param  int $type
     * @param  int $status
     * @return Response
     */
    public function userSummeryReport($type = null, $status = null)
    {
        return User::select(
            DB::raw('COUNT(*) as total'),
            DB::raw("DATE_FORMAT(created_at,'%d %M %Y') as monthsYears")
        )
            ->where('role', $type)
            ->where('status', $status)
            ->groupBy('monthsYears')
            ->get();
    }

    /**
     * walletSubByStatus
     *
     * @param  int $type
     * @param  int $status
     * @param  int $userType
     * @return Response
     */
    public function walletSubByStatus($type = null, $status = null, $userType = null)
    {
        $wallet = Wallet::where('type', $type)->where('status', $status);
        if (!empty($userType)) {
            return $wallet->where('user_id', $userType)->sum('amount');
        }
        return $wallet->sum('amount');
    }

    /**
     * walletMultiTypeByStatus
     *
     * @param  int $type
     * @param  int $status
     * @param  int $author
     * @return Response
     */
    public function walletMultiTypeByStatus($type = null, $status = null, $author = null)
    {
        if (!empty($author)) {
            return Wallet::where('wallets.status', $status)->where('wallets.type', $type)->join('orders', 'orders.id', '=', 'wallets.order_id')
                ->where('orders.merchant_id', $author)->sum('wallets.amount');
        } else {
            $wallet = Wallet::where('status', $status)->where('type', $type);
            return $wallet->sum('amount');
        }
    }

    /**
     * taxMultiTypeByStatus
     *
     * @param  int $type
     * @param  int $status
     * @param  int $userType
     * @return Response
     */
    public function taxMultiTypeByStatus($type = null, $status = null, $userType = null)
    {
        $wallet = Wallet::where('status', $status)->where('type', $type);
        if (!empty($userType)) {
            return $wallet->where('user_id', $userType)->sum('amount');
        }
        return $wallet->sum('tax_amount');
    }


    /**
     * merchantPaymentInfo
     *
     * @param  mixed $request
     * @param  int $id
     * @return response
     */
    protected function merchantPaymentInfo($request, $id)
    {
        $new_existing     = array_filter($request->merchant_payment_id);
        $existing_payment = MerchantPaymentInfo::where('user_id', $id)->pluck('id')->toArray();
        $remove_existing  = array_diff($existing_payment, $new_existing);
        MerchantPaymentInfo::where('id', $remove_existing)->delete();
        foreach ($request->merchant_payment_id as $key => $val) {
            if ($val != null) {
                $merchant_payment                        = MerchantPaymentInfo::findOrFail($val);
                $merchant_payment->payment_type          = $request->payment_type[$key];
                $merchant_payment->bank_name             = $request->bank_name[$key];
                $merchant_payment->branch_name           = $request->branch_name[$key];
                $merchant_payment->bank_ac_name          = $request->bank_ac_name[$key];
                $merchant_payment->bank_ac_number        = $request->bank_ac_number[$key];
                $merchant_payment->bank_routing_number   = $request->bank_routing_number[$key];
                $merchant_payment->mobile_banking_name   = $request->mobile_banking_name[$key];
                $merchant_payment->mobile_banking_number = $request->mobile_banking_number[$key];
                $merchant_payment->paypal_name           = $request->paypal_name[$key];
                $merchant_payment->paypal_username       = $request->paypal_username[$key];
                $merchant_payment->paypal_email          = $request->paypal_email[$key];
                $merchant_payment->paypal_mobile_number  = $request->paypal_mobile_number[$key];
                $merchant_payment->update();
            } elseif ($request->payment_type[$key]) {
                $merchant_payment               = new MerchantPaymentInfo();
                $merchant_payment->user_id      = $id;
                $merchant_payment->payment_type = $request->payment_type[$key];

                if ($request->payment_type[$key] == 1) {
                    $merchant_payment->bank_name           = $request->bank_name[$key];
                    $merchant_payment->branch_name         = $request->branch_name[$key];
                    $merchant_payment->bank_ac_name        = $request->bank_ac_name[$key];
                    $merchant_payment->bank_ac_number      = $request->bank_ac_number[$key];
                    $merchant_payment->bank_routing_number = $request->bank_routing_number[$key];
                } elseif ($request->payment_type[$key] == 2) {
                    $merchant_payment->mobile_banking_name   = $request->mobile_banking_name[$key];
                    $merchant_payment->mobile_banking_number = $request->mobile_banking_number[$key];
                } else {
                    $merchant_payment->paypal_name          = $request->paypal_name[$key];
                    $merchant_payment->paypal_username      = $request->paypal_username[$key];
                    $merchant_payment->paypal_email         = $request->paypal_email[$key];
                    $merchant_payment->paypal_mobile_number = $request->paypal_mobile_number[$key];
                }
                $merchant_payment->save();
            }
        }
    }

    public function deleteDemoData(){
        Artisan::call('migrate:fresh', [
            '--force' => true
        ]);

        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\DatabaseSeeder',
            '--force' => true
        ]);
        return redirect()->back()->with('success', translate('Demo data remove successfully'));
    }
}
