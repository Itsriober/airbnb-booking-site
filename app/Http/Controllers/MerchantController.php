<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Activities;
use App\Models\Transport;
use App\Models\Order;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MerchantPaymentInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin','pverify']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page_title = translate('Users List');
        if ($request->search) {
            $merchants = User::where('role', 2)->where(DB::raw("concat(fname, ' ', lname)"), 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->orWhere('custom_id', $request->search)
                ->latest()->paginate(12);
        } else {
            $merchants = User::where('role', 2)->latest()->paginate(12);
        }
        $data['total_merchants'] = $this->getUserByRole(2)->count();

        return view('backend.merchant.index', compact('page_title', 'merchants', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = translate('Create Agent');
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.merchant.create', compact('page_title', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            'phone' => 'required|max:255|unique:users,phone',
            'address' => 'required|max:255',
            'country_id' => 'required|max:255',
            'state_id' => 'required|max:255',
            'city_id' => 'required|max:255',
            'zip_code' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'password' => 'required|confirmed|min:8',
            'image' => 'nullable|image',
            'admin_commission' => 'nullable|max:255',
            'shop_name' => 'required|max:255|unique:stores,name',
            'shop_email' => 'nullable|max:255',
            'shop_phone' => 'nullable|max:255',
            'shop_address' => 'nullable|max:255',
            'shop_logo' => 'nullable',
            'cover_img' => 'nullable',
            'facebook_link' => 'nullable|max:255',
            'twitter_link' => 'nullable|max:255',
            'linkedin_link' => 'nullable|max:255',
            'instagram_link' => 'nullable|max:255',
            'pinterest_link' => 'nullable|max:255',
            'youtube_link' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $merchant = new User;
        /** image upload */
        $image = $request->file('image');
        if ($image != '') {
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users'), $image_name);
            $merchant->image = $image_name;
        }

        $users = User::where('role', 2)->orderBy('id', 'desc')->pluck('custom_id')->first();
        if ($users) {
            $numbers = substr($users, 2);
            $merchant_id = 'MC' . str_pad(($numbers +  1), 4, '0', STR_PAD_LEFT);
            $merchant->custom_id = $merchant_id;
        } else {
            $merchant->custom_id = 'MC0001';
        }
        $merchant->fname = $request->fname;
        $merchant->lname = $request->lname;
        $merchant->email = $request->email;
        $merchant->phone = $request->phone;
        $merchant->address = $request->address;
        $merchant->country_id = $request->country_id;
        $merchant->state_id = $request->state_id;
        $merchant->city_id = $request->city_id;
        $merchant->zip_code = $request->zip_code;
        $merchant->username = $request->username;
        $merchant->admin_commission = $request->admin_commission;
        $merchant->password = Hash::make($request->password);
        $merchant->role = 2;
        if ($merchant->save()) {
            $user_id = $merchant->id;

            $shop = new Store;
            /** Shop Logo upload */
            $shop_logo = $request->file('shop_logo');
            if ($shop_logo != '') {
                $shop_logo_name = pathinfo($shop_logo->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $shop_logo->getClientOriginalExtension();
                $shop_logo->move(public_path('uploads/shop'), $shop_logo_name);
                $shop->logo = $shop_logo_name;
            }
            /** Shop Cover Image upload */
            $cover_img = $request->file('cover_img');
            if ($cover_img != '') {
                $cover_img_name = pathinfo($cover_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $cover_img->getClientOriginalExtension();
                $cover_img->move(public_path('uploads/shop'), $cover_img_name);
                $shop->cover_img = $cover_img_name;
            }
            $shop->name = $request->shop_name;
            $slug = Str::slug($request->shop_name, '-');
            $shop->slug = $slug;
            $shop->author_id = $user_id;
            $shop->email = $request->shop_email;
            $shop->phone = $request->shop_phone;
            $shop->address = $request->shop_address;
            $shop->facebook = $request->facebook_link;
            $shop->twitter = $request->twitter_link;
            $shop->linkedin = $request->linkedin_link;
            $shop->instagram = $request->instagram_link;
            $shop->pinterest = $request->pinterest_link;
            $shop->youtube = $request->youtube_link;
            $shop->save();

            if ($request->payment_type) {
                foreach ($request->payment_type as $key => $val) {
                    $merchant_payment = new MerchantPaymentInfo;
                    $merchant_payment->user_id = $user_id;
                    $merchant_payment->payment_type = $val;
                    if ($request->payment_type[$key] == 1) {
                        $merchant_payment->bank_name = $request->bank_name[$key];
                        $merchant_payment->branch_name = $request->branch_name[$key];
                        $merchant_payment->bank_ac_name = $request->bank_ac_name[$key];
                        $merchant_payment->bank_ac_number = $request->bank_ac_number[$key];
                        $merchant_payment->bank_routing_number = $request->bank_routing_number[$key];
                    } elseif ($request->payment_type[$key] == 2) {
                        $merchant_payment->mobile_banking_name = $request->mobile_banking_name[$key];
                        $merchant_payment->mobile_banking_number = $request->mobile_banking_number[$key];
                    } else {
                        $merchant_payment->paypal_name = $request->paypal_name[$key];
                        $merchant_payment->paypal_username = $request->paypal_username[$key];
                        $merchant_payment->paypal_email = $request->paypal_email[$key];
                        $merchant_payment->paypal_mobile_number = $request->paypal_mobile_number[$key];
                    }
                    $merchant_payment->save();
                }
            }
        }

        return redirect()->route('merchant.list')->with('success', translate('Agent saved successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $page_title = translate('User Profile');
        $merchantSingle = User::findOrFail($id);
        $merchant_payment = MerchantPaymentInfo::where('user_id', $id)->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        $merchant_orders = Order::where('merchant_id', $merchantSingle->id)->latest()->paginate(10);
        $tours = Tour::where('author_id', $id)->latest()->limit(10)->get();
        $hotels = Hotel::where('author_id', $id)->latest()->limit(10)->get();
        $activities = Activities::where('author_id', $id)->latest()->limit(10)->get();
        $transports = Transport::where('author_id', $id)->latest()->limit(10)->get();

        return view('backend.merchant.profile', compact('page_title', 'merchantSingle', 'countries', 'merchant_payment', 'merchant_orders', 'tours','hotels','activities','transports'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $user = Auth::user()->role;
        if ($user == 3 || $user == 4) {
            $page_title = translate('Edit Agent');
        } elseif ($user == 2 && Auth::user()->id == $id) {
            $page_title = translate('User Profile');
        } else {
            return redirect()->back()->with('error', translate('Access not found'));
        }
        $merchantSingle = User::findOrFail($id);
        $merchant_payment = MerchantPaymentInfo::where('user_id', $id)->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.merchant.edit', compact('page_title', 'merchantSingle', 'countries', 'merchant_payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $merchants = User::findOrFail($id);
        /** Validation */
        $validator = Validator::make($request->all(), [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,' . $merchants->id,
            'phone' => 'required|unique:users,phone,' . $merchants->id,
            'address' => 'required|max:255',
            'country_id' => 'required|max:255',
            'state_id' => 'required|max:255',
            'city_id' => 'required|max:255',
            'zip_code' => 'required|max:255',
            'password' => 'nullable|confirmed|min:8',
            'image' => 'nullable|image',
            'admin_commission' => 'nullable|max:255',
            'shop_name' => 'required|max:255|unique:stores,name,' . $merchants->shop->id,
            'shop_email' => 'nullable|max:255',
            'shop_phone' => 'nullable|max:255',
            'shop_address' => 'nullable|max:255',
            'shop_logo' => 'nullable',
            'cover_img' => 'nullable',
            'facebook_link' => 'nullable|max:255',
            'twitter_link' => 'nullable|max:255',
            'linkedin_link' => 'nullable|max:255',
            'instagram_link' => 'nullable|max:255',
            'pinterest_link' => 'nullable|max:255',
            'youtube_link' => 'nullable|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        /** image upload */
        $image = $request->file('image');
        if ($image != '') {
            if ($merchants->image && file_exists(public_path('uploads/users/' . $merchants->image))) {
                unlink(public_path('uploads/users/' . $merchants->image));
            }
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users'), $image_name);
            $merchants->image = $image_name;
        }
        $merchants->fname = $request->fname;
        $merchants->lname = $request->lname;
        $merchants->address = $request->address;
        $merchants->email = $request->email;
        $merchants->phone = $request->phone;
        $merchants->country_id = $request->country_id;
        $merchants->state_id = $request->state_id;
        $merchants->city_id = $request->city_id;
        $merchants->zip_code = $request->zip_code;
        $merchants->admin_commission = $request->admin_commission;
        if ($merchants->password) {
            $merchants->password = Hash::make($request->password);
        }

        if ($merchants->update()) {

            $shop = Store::where('author_id', $merchants->id)->first();
            /** Shop Logo upload */
            $shop_logo = $request->file('shop_logo');
            if ($shop_logo != '') {
                if (file_exists(public_path('uploads/shop/' . $shop->logo))) {
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
            $shop->name = $request->shop_name;
            $shop->email = $request->shop_email;
            $shop->phone = $request->shop_phone;
            $shop->address = $request->shop_address;
            $shop->facebook = $request->facebook_link;
            $shop->twitter = $request->twitter_link;
            $shop->linkedin = $request->linkedin_link;
            $shop->instagram = $request->instagram_link;
            $shop->pinterest = $request->pinterest_link;
            $shop->youtube = $request->youtube_link;
            $shop->update();


            $new_existing = array_filter($request->merchant_payment_id);
            $existing_payment = MerchantPaymentInfo::where('user_id', $id)->pluck('id')->toArray();
            $remove_existing = array_diff($existing_payment, $new_existing);
            MerchantPaymentInfo::where('id', $remove_existing)->delete();
            foreach ($request->merchant_payment_id as $key => $val) {

                if ($val != null) {
                    $merchant_payment = MerchantPaymentInfo::findOrFail($val);
                    $merchant_payment->payment_type = $request->payment_type[$key];
                    $merchant_payment->bank_name = $request->bank_name[$key];
                    $merchant_payment->branch_name = $request->branch_name[$key];
                    $merchant_payment->bank_ac_name = $request->bank_ac_name[$key];
                    $merchant_payment->bank_ac_number = $request->bank_ac_number[$key];
                    $merchant_payment->bank_routing_number = $request->bank_routing_number[$key];
                    $merchant_payment->mobile_banking_name = $request->mobile_banking_name[$key];
                    $merchant_payment->mobile_banking_number = $request->mobile_banking_number[$key];
                    $merchant_payment->paypal_name = $request->paypal_name[$key];
                    $merchant_payment->paypal_username = $request->paypal_username[$key];
                    $merchant_payment->paypal_email = $request->paypal_email[$key];
                    $merchant_payment->paypal_mobile_number = $request->paypal_mobile_number[$key];
                    $merchant_payment->update();
                } else {

                    if ($request->payment_type[$key]) {
                        $merchant_payment = new MerchantPaymentInfo;
                        $merchant_payment->user_id = $id;
                        $merchant_payment->payment_type = $request->payment_type[$key];
                        if ($request->payment_type[$key] == 1) {
                            $merchant_payment->bank_name = $request->bank_name[$key];
                            $merchant_payment->branch_name = $request->branch_name[$key];
                            $merchant_payment->bank_ac_name = $request->bank_ac_name[$key];
                            $merchant_payment->bank_ac_number = $request->bank_ac_number[$key];
                            $merchant_payment->bank_routing_number = $request->bank_routing_number[$key];
                        } elseif ($request->payment_type[$key] == 2) {
                            $merchant_payment->mobile_banking_name = $request->mobile_banking_name[$key];
                            $merchant_payment->mobile_banking_number = $request->mobile_banking_number[$key];
                        } else {
                            $merchant_payment->paypal_name = $request->paypal_name[$key];
                            $merchant_payment->paypal_username = $request->paypal_username[$key];
                            $merchant_payment->paypal_email = $request->paypal_email[$key];
                            $merchant_payment->paypal_mobile_number = $request->paypal_mobile_number[$key];
                        }
                        $merchant_payment->save();
                    }
                }
            }
        }

        if (Auth::user()->role == 2) {
            return redirect()->back()->with('success', translate('Your profile has been updated successfully'));
        } else {
            return redirect()->route('merchant.list')->with('success', translate('Agent has been updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $merchants = User::findOrFail($id);
        if ($merchants->image && file_exists(public_path('uploads/users/' . $merchants->image))) {
            unlink(public_path('uploads/users/' . $merchants->image));
        }
        $merchants->delete();
        return back()->with('success', translate('Agent deleted successfully'));
    }

    /**
     * Change merchant status.
     */

    public function changeStatus()
    {
        $status         = $_POST['status'];
        $merchantId     = $_POST['dataId'];

        if ($status && $merchantId) {
            $merchant = User::findOrFail($merchantId);
            if ($status == 1) {
                $merchant->status = 2;
                $message = translate('Agent Deactive');
            } else {
                $merchant->status = 1;
                $message = translate('Agent Active');
            }
            if ($merchant->update()) {
                $response = array('output' => 'success', 'statusId' => $merchant->status, 'dataId' => $merchant->id, 'message' => $message, 'active' => translate('Active'), 'deactive' => translate('Deactive'));
                return response()->json($response);
            }
        }
    }

    /**
     * login
     *
     * @param  int $id
     * @return Response
     */
    public function login($id)
    {
        $merchant = User::findOrFail(decrypt($id));

        auth()->login($merchant, true);

        return redirect()->route('backend.dashboard');
    }

    /**
     * getUserByRole
     *
     * @param  int $role
     * @return Response
     */
    public function getUserByRole($role)
    {
        return User::where('role', $role)->get();
    }
}
