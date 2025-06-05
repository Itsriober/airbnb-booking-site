<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelGallery;
use App\Models\HotelAttribute;
use App\Models\HotelTranslation;
use App\Models\User;
use App\Models\Location;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $page_title = translate('Stay List');
        if ($user->role == 2) {
            $hotels = Hotel::where('author_id', $user->id)
                ->when(request('search'), function ($q) {
                    $location = Location::where('name', request('search'))->first();
                    return $q->where('title', 'like', '%' . request('search') . '%')
                        ->orWhere('price', request('search'))
                        ->when($location != null, function ($q) use ($location) {
                            return $q->orWhere('country_id', $location->id)
                                ->orWhere('state_id', $location->id)
                                ->orWhere('city_id', $location->id);
                        });
                })->latest()->paginate(10)->withQueryString();

            $data['total_hotel'] = Hotel::where('author_id', $user->id)->count();
            $data['total_active'] = Hotel::where('author_id', $user->id)->where('status', 1)->count();
            $data['total_booking'] = Order::where('merchant_id', $user->id)->where('product_type', 'transports')->count();
            $data['total_booking_amount'] = Order::where('merchant_id', $user->id)->where('product_type', 'hotel')->sum('total_with_tax');
        } else {
            $hotels = Hotel::when(request('search'), function ($q) {
                $location = Location::where('name', request('search'))->first();
                return $q->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('price', request('search'))
                    ->when($location != null, function ($q) use ($location) {
                        return $q->orWhere('country_id', $location->id)
                            ->orWhere('state_id', $location->id)
                            ->orWhere('city_id', $location->id);
                    });
            })->latest()->paginate(10)->withQueryString();

            $data['total_hotel'] = Hotel::count();
            $data['total_active'] = Hotel::where('status', 1)->count();

            $data['total_inactive'] = Hotel::where('status', 3)->count();
            $data['total_booking'] = Order::where('product_type', 'transports')->count();
            $data['total_booking_amount'] = Order::where('product_type', 'hotel')->sum('total_with_tax');
        }
        return view('backend.hotels.index', compact('page_title', 'hotels', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = translate('Add Hotel');
        $attributes = HotelAttribute::orderBy('name', 'asc')->get();
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.hotels.create', compact('attributes', 'authors', 'countries', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'youtube_image' => 'nullable',
            'youtube_video' => 'nullable',
            'policy_title' => 'nullable',
            'check_in' => 'nullable|max:255',
            'check_out' => 'nullable|max:255',
            'room_type' => 'required|max:40',
            'bed_type' => 'required|max:40',
            'guest_capability' => 'required|integer|max:11',
            'cancellation' => 'required|max:40',
            'min_advance_reservations' => 'nullable|max:255',
            'min_stay' => 'nullable|max:255',
            'price' => 'required|max:255',
            'address' => 'nullable|max:255',
            'country_id' => 'nullable|max:255',
            'state_id' => 'nullable|max:255',
            'city_id' => 'nullable|max:255',
            'zip_code' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyward' => 'nullable',
            'meta_img' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'features_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'image' => 'nullable',
            'status' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $hotels = new Hotel;

        if ($request->hasFile('features_image')) {
            $features_image = $request->file('features_image');
            if ($features_image != '') {
                $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
                $features_image->move(public_path('uploads/hotel/features'), $features_image_name);
                $hotels->feature_img = $features_image_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/hotel/meta'), $meta_img_name);
                $hotels->meta_img = $meta_img_name;
            }
        }

        if ($request->hasFile('youtube_image')) {
            $youtube_image = $request->file('youtube_image');
            if ($youtube_image != '') {
                $youtube_image_name = pathinfo($youtube_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $youtube_image->getClientOriginalExtension();
                $youtube_image->move(public_path('uploads/hotel/youtube'), $youtube_image_name);
                $hotels->youtube_image = $youtube_image_name;
            }
        }

        $hotels->title = $request->title;

        $slug = Str::slug($request->title, '-');
        $same_slug_count = Hotel::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;
        $hotels->slug = $slug;

        $hotels->content = Purifier::clean($request->content);
        $hotels->youtube_video = $request->youtube_video;
        $hotels->policy_title = $request->policy_title;
        $hotels->check_in = $request->check_in;
        $hotels->check_out = $request->check_out;
        $hotels->room_type = $request->room_type;
        $hotels->bed_type = $request->bed_type;
        $hotels->guest_capability = $request->guest_capability;
        $hotels->cancellation = $request->cancellation;
        $hotels->min_advance_reservations = $request->min_advance_reservations;
        $hotels->min_stay = $request->min_stay;
        $hotels->price = $request->price;
        $hotels->enable_service_fee = $request->enable_service_fee ? $request->enable_service_fee : 2;
        $hotels->address = $request->address;
        $hotels->country_id = $request->country_id;
        $hotels->state_id = $request->state_id;
        $hotels->city_id = $request->city_id;
        $hotels->zip_code = $request->zip_code;
        $hotels->map_lat = $request->map_lat;
        $hotels->map_lng = $request->map_lng;
        $hotels->meta_title = $request->meta_title;
        $hotels->meta_desc =  Purifier::clean($request->meta_description);
        $hotels->meta_keyward = $request->meta_keyward;
        $hotels->breakfast = $request->breakfast ? $request->breakfast : 2;
        if ($user->role == 2) {
            $hotels->author_id = $user->id;
            if ($request->status == 1) {
                $hotels->status = 3;
            } else {
                $hotels->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $hotels->author_id = $request->author_id;
            $hotels->status = $request->status;
        }
        $hotels->enable_seo = $request->enable_seo == "on" ? 1 : null;
        $hotels->policies = json_encode($request->policy) ?? null;
        $hotels->service_fees = json_encode($request->service_fee) ?? null;

        $hotels->attribute_terms = json_encode($request->term) ?? null;
        $hotels->save();
        $this->hotelGallery($request, $hotels->id, $features_image);
        return redirect()->route('hotels.list')->with('success', translate('Hotel saved successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $page_title = translate('Edit Hotel');
        $lang = $request->lang;
        $hotelSingle = Hotel::findOrFail($id);
        $data['policies'] = $hotelSingle->policies ? json_decode($hotelSingle->policies) : NULL;
        $data['service_fees'] = $hotelSingle->service_fees ? json_decode($hotelSingle->service_fees) : NULL;
        $data['attribute_terms'] = $hotelSingle->attribute_terms ? json_decode($hotelSingle->attribute_terms) : NULL;
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $galleries = HotelGallery::where('hotel_id', $id)->get();
        $attributes = HotelAttribute::orderBy('name', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.hotels.edit', compact('data', 'authors', 'page_title', 'hotelSingle', 'lang', 'galleries', 'attributes', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'youtube_image' => 'nullable',
            'youtube_video' => 'nullable',
            'policy_title' => 'nullable',
            'check_in' => 'nullable|max:255',
            'check_out' => 'nullable|max:255',
            'room_type' => 'required|max:40',
            'bed_type' => 'required|max:40',
            'guest_capability' => 'required|integer|max:11',
            'cancellation' => 'required|max:40',
            'min_advance_reservations' => 'nullable|max:255',
            'min_stay' => 'nullable|max:255',
            'price' => 'required|max:255',
            'address' => 'nullable|max:255',
            'country_id' => 'nullable|max:255',
            'state_id' => 'nullable|max:255',
            'city_id' => 'nullable|max:255',
            'zip_code' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyward' => 'nullable',
            'meta_img' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'image' => 'nullable',
            'status' => 'required|max:255',
        ]);

        if ($request->hasFile('features_image')) {
            $validator = Validator::make($request->all(), [
                'features_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $hotels = Hotel::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $hotels->title = $request->title;
            $hotels->content = Purifier::clean($request->content);
            $hotels->address = $request->address;
        }
        /** Features image upload */
        $features_image = $request->file('features_image');
        if ($features_image != '') {
            if (file_exists(public_path('uploads/hotel/features/' . $hotels->feature_img))) {
                unlink(public_path('uploads/hotel/features/' . $hotels->feature_img));
            }
            $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
            $features_image->move(public_path('uploads/hotel/features'), $features_image_name);
            $hotels->feature_img = $features_image_name;
        }
        /** Meta image upload */
        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                if ($hotels->meta_img && file_exists(public_path('uploads/hotel/meta/' . $hotels->meta_img))) {
                    unlink(public_path('uploads/hotel/meta/' . $hotels->meta_img));
                }
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/hotel/meta'), $meta_img_name);
                $hotels->meta_img = $meta_img_name;
            }
        }

        if ($request->hasFile('youtube_image')) {
            $youtube_image = $request->file('youtube_image');
            if ($youtube_image != '') {
                if ($hotels->youtube_image && file_exists(public_path('uploads/hotel/youtube/' . $hotels->youtube_image))) {
                    unlink(public_path('uploads/hotel/youtube/' . $hotels->youtube_image));
                }
                $youtube_image_name = pathinfo($youtube_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $youtube_image->getClientOriginalExtension();
                $youtube_image->move(public_path('uploads/hotel/youtube'), $youtube_image_name);
                $hotels->youtube_image = $youtube_image_name;
            }
        }

        $hotels->youtube_video = $request->youtube_video;
        $hotels->policy_title = $request->policy_title;
        $hotels->check_in = $request->check_in;
        $hotels->check_out = $request->check_out;
        $hotels->room_type = $request->room_type;
        $hotels->bed_type = $request->bed_type;
        $hotels->guest_capability = $request->guest_capability;
        $hotels->cancellation = $request->cancellation;
        $hotels->min_advance_reservations = $request->min_advance_reservations;
        $hotels->min_stay = $request->min_stay;
        $hotels->price = $request->price;
        $hotels->enable_service_fee = $request->enable_service_fee ? $request->enable_service_fee : 2;
        $hotels->address = $request->address;
        $hotels->country_id = $request->country_id;
        $hotels->state_id = $request->state_id;
        $hotels->city_id = $request->city_id;
        $hotels->zip_code = $request->zip_code;
        $hotels->map_lat = $request->map_lat;
        $hotels->map_lng = $request->map_lng;
        $hotels->meta_title = $request->meta_title;
        $hotels->meta_desc =  Purifier::clean($request->meta_description);
        $hotels->meta_keyward = $request->meta_keyward;
        $hotels->breakfast = $request->breakfast ? $request->breakfast : 2;
        if ($user->role == 2) {
            if ($request->status == 1) {
                $hotels->status = 3;
            } else {
                $hotels->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $hotels->status = $request->status;
        }

        $hotels->enable_seo = $request->enable_seo == "on" ? 1 : null;
        $hotels->policies = json_encode($request->policy) ?? null;
        $hotels->service_fees = json_encode($request->service_fee) ?? null;
        $hotels->attribute_terms = json_encode($request->term) ?? null;

        if ($hotels->update()) {
            $hotel_translation = HotelTranslation::firstOrNew(['lang' => $request->lang, 'hotel_id' => $hotels->id]);
            $hotel_translation->title = $request->title;
            $hotel_translation->content = Purifier::clean($request->content);
            $hotel_translation->address = $request->address;
            $hotel_translation->save();

            $this->hotelGallery($request, $hotels->id, $features_image);
        }
        return redirect()->back()->with('success', translate('Hotel updated successfully'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotels = Hotel::findOrFail($id);
        if ($hotels->feature_img && file_exists(public_path('uploads/hotel/features/' . $hotels->feature_img))) {
            unlink(public_path('uploads/hotel/features/' . $hotels->feature_img));
        }
        if ($hotels->meta_img && file_exists(public_path('uploads/hotel/meta/' . $hotels->meta_img))) {
            unlink(public_path('uploads/hotel/meta/' . $hotels->meta_img));
        }
        $product_gallery = HotelGallery::where('hotel_id', $id)->get();
        if ($product_gallery != null) {
            foreach ($product_gallery as $pgallery) {
                if(file_exists(public_path('uploads/hotel/gallery/' . $pgallery->image))){
                    unlink(public_path('uploads/hotel/gallery/' . $pgallery->image));
                }

            }
        }
        $hotels->delete();
        return back()->with('success', translate('Hotel deleted successfully'));
    }

    /**
     * Pending product approved.
     */
    public function approve(Request $request, $id)
    {
        $hotels = Hotel::findOrFail($id);
        $hotels->status = 1;
        $hotels->update();

        return back()->with('success', translate('Hotel approved successfully'));
    }

    /**
     * Change Hotel status.
     */

    public function changeStatus()
    {
        $status         = $_POST['status'];
        $hotelId     = $_POST['dataId'];

        if ($status && $hotelId) {
            $hotels = Hotel::findOrFail($hotelId);
            if ($status == 1) {
                $hotels->status = 3;
                $message = translate('Hotel Deactive');
            } else {
                $hotels->status = 1;
                $message = translate('Hotel Active');
            }
        }
        if ($hotels->update()) {
            $response = array('output' => 'success', 'statusId' => $hotels->status, 'dataId' => $hotels->id, 'message' => $message);
            return response()->json($response);
        }
    }

    /**
     * Gallery image remove.
     */

    public function gallery_remove()
    {
        $dataId = $_POST['dataId'];

        if ($dataId) {
            $gallery = HotelGallery::findOrFail($dataId);
            if (file_exists(public_path('uploads/hotel/gallery/' . $gallery->image))) {
                unlink(public_path('uploads/hotel/gallery/' . $gallery->image));
            }
            $message = translate('Gallery Image Deleted');

            if ($gallery->delete()) {
                $response = array('output' => 'success', 'dataId' => $dataId, 'message' => $message);
                return response()->json($response);
            }
        }
    }



    /**
     * productGallery
     *
     * @param  mixed $request
     * @param  int $product_id
     * @param  mixed $features_image
     * @return Response
     */
    public function hotelGallery($request, $hotel_id, $features_image)
    {
        if ($request->file('image')) {
            $allowedfileExtension = ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'];
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $hotel_gallery = new HotelGallery;
                    $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/hotel/gallery'), $image_name);
                    $hotel_gallery->image = $image_name;
                    $hotel_gallery->hotel_id = $hotel_id;
                    $hotel_gallery->save();
                }
            }
        }
    }

    public function review(Request $request,$id){
        $user = Auth::user();
        $page_title = translate('Reviews');
        $lang = $request->lang;
        if($user->role == 2){
            $hotelReviews = Review::where('product_type','hotel')->where('product_id',$id)->whereNull('parent_id')->where('author_id',$user->id)->latest()->paginate(10)->withQueryString();
        }else{
            $hotelReviews = Review::where('product_type','hotel')->where('product_id',$id)->whereNull('parent_id')->latest()->paginate(10)->withQueryString();
        }

        return view('backend.hotels.reviews', compact('page_title', 'hotelReviews', 'lang'));
    }

    public function reply(Request $request){

        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'product_type' => 'required|max:255',
            'product_id' => 'required|max:255',
            'review_id' => 'required|max:255',
            'reply_message' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $reviews = new Review;
        $reviews->product_type = $request->product_type;
        $reviews->product_id = $request->product_id;
        $reviews->parent_id = $request->review_id;
        $reviews->review = $request->reply_message;
        $reviews->user_id = $user->id;
        $reviews->save();
        return back()->with('success', translate('Replied successfully'));
    }

    public function reviewStatus()
    {
        $status         = $_POST['status'];
        $hotelId        = $_POST['dataId'];

        if ($status && $hotelId) {
            $review = Review::findOrFail($hotelId);
            if ($status == 1) {
                $review->status = 2;
                $message = translate('Review Deactive');
            } else {
                $review->status = 1;
                $message = translate('Review Active');
            }
        }
        if ($review->update()) {
            $response = array('output' => 'success', 'statusId' => $review->status, 'dataId' => $review->id, 'message' => $message);
            return response()->json($response);
        }
    }
}
