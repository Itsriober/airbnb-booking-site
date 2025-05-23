<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\TransportGallery;
use App\Models\TransportAttribute;
use App\Models\TransportTranslation;
use App\Models\User;
use App\Models\Location;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $page_title = translate('Transport List');
        if ($user->role == 2) {
            $transports = Transport::where('author_id', $user->id)
                ->when(request('search'), function ($q) {
                    $location = Location::where('name', request('search'))->first();
                    return $q->where('title', 'like', '%' . request('search') . '%')
                        ->when($location != null, function ($q) use ($location) {
                            return $q->orWhere('country_id', $location?->id)
                                ->orWhere('state_id', $location?->id)
                                ->orWhere('city_id', $location?->id);
                        });
                })->latest()->paginate(10)->withQueryString();

            $data['total_transports'] = Transport::where('author_id', $user->id)->count();
            $data['total_active'] = Transport::where('author_id', $user->id)->where('status', 1)->count();
            $data['total_booking'] = Order::where('merchant_id', $user->id)->where('product_type', 'transports')->count();
            $data['total_booking_amount'] = Order::where('merchant_id', $user->id)->where('product_type', 'transports')->sum('total_with_tax');
        } else {
            $transports = Transport::when(request('search'), function ($q) {
                $location = Location::where('name', request('search'))->first();
                return $q->where('title', 'like', '%' . request('search') . '%')
                    ->when($location != null, function ($q) use ($location) {
                        return $q->orWhere('country_id', $location?->id)
                            ->orWhere('state_id', $location?->id)
                            ->orWhere('city_id', $location?->id);
                    });
            })->latest()->paginate(10)->withQueryString();

            $data['total_transports'] = Transport::count();
            $data['total_active'] = Transport::where('status', 1)->count();
            $data['total_inactive'] = Transport::where('status', 3)->count();
            $data['total_booking'] = Order::where('product_type', 'transports')->count();
            $data['total_booking_amount'] = Order::where('product_type', 'transports')->sum('total_with_tax');
        }
        return view('backend.transports.index', compact('page_title', 'transports', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = translate('Add Transports');
        $attributes = TransportAttribute::orderBy('name', 'asc')->get();
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.transports.create', compact('attributes', 'authors', 'countries', 'page_title'));
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
            'youtube_video' => 'nullable',
            'distance_km' => 'nullable|numeric',
            'min_advance_reservations' => 'nullable|max:255',
            'min_stay' => 'nullable|max:255',
            'car_type' => 'nullable|max:255',
            'car_price' => 'nullable|max:255',
            'car_sale_price' => 'nullable|max:255',
            'car_person' => 'nullable|max:255',
            'bus_price' => 'nullable|max:255',
            'bus_sale_price' => 'nullable|max:255',
            'bus_child_price' => 'nullable|max:255',
            'train_price' => 'nullable|max:255',
            'train_sale_price' => 'nullable|max:255',
            'train_child_price' => 'nullable|max:255',
            'boat_price' => 'nullable|max:255',
            'boat_sale_price' => 'nullable|max:255',
            'boat_child_price' => 'nullable|max:255',
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
            'faq_title' => 'nullable|max:255',
            'include_title' => 'nullable|max:255',
            'exclude_title' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transports = new Transport;

        if ($request->hasFile('features_image')) {
            $features_image = $request->file('features_image');
            if ($features_image != '') {
                $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
                $features_image->move(public_path('uploads/transports/features'), $features_image_name);
                $transports->feature_img = $features_image_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/transports/meta'), $meta_img_name);
                $transports->meta_img = $meta_img_name;
            }
        }

        $transports->title = $request->title;

        $slug = Str::slug($request->title, '-');
        $same_slug_count = Transport::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;
        $transports->slug = $slug;

        $transports->content = Purifier::clean($request->content);
        $transports->youtube_video = $request->youtube_video;
        $transports->distance_km = $request->distance_km;
        $transports->min_advance_reservations = $request->min_advance_reservations;
        $transports->min_stay = $request->min_stay;
        $transports->car_type = $request->car_type;
        $transports->car_price = $request->car_price ?? 0;
        $transports->car_sale_price = $request->car_sale_price ?? 0;
        $transports->car_person = $request->car_person;
        $transports->bus_price = $request->bus_price ?? 0;
        $transports->bus_sale_price = $request->bus_sale_price ?? 0;
        $transports->bus_child_price = $request->bus_child_price ?? 0;
        $transports->train_price = $request->train_price ?? 0;
        $transports->train_sale_price = $request->train_sale_price ?? 0;
        $transports->train_child_price = $request->train_child_price ?? 0;
        $transports->boat_price = $request->boat_price ?? 0;
        $transports->boat_sale_price = $request->boat_sale_price ?? 0;
        $transports->boat_child_price = $request->boat_child_price ?? 0;
        $transports->enable_service_fee = $request->enable_service_fee ? $request->enable_service_fee : 2;
        $transports->address = $request->address;
        $transports->faq_title = $request->faq_title;
        $transports->include_title = $request->include_title;
        $transports->exclude_title = $request->exclude_title;
        $transports->country_id = $request->country_id;
        $transports->state_id = $request->state_id;
        $transports->city_id = $request->city_id;
        $transports->zip_code = $request->zip_code;
        $transports->meta_title = $request->meta_title;
        $transports->meta_desc =  Purifier::clean($request->meta_description);
        $transports->meta_keyward = $request->meta_keyward;

        if ($user->role == 2) {
            $transports->author_id = $user->id;
            if ($request->status == 1) {
                $transports->status = 3;
            } else {
                $transports->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $transports->author_id = $request->author_id;
            $transports->status = $request->status;
        }
        $transports->enable_seo = $request->enable_seo == "on" ? 1 : null;
        $transports->faqs = json_encode($request->faqs) ?? null;
        $transports->service_fees = json_encode($request->service_fee) ?? null;
        $transports->includes = json_encode($request->includes) ?? null;
        $transports->excludes = json_encode($request->excludes) ?? null;
        $transports->attribute_terms = json_encode($request->term) ?? null;
        $transports->save();
        $this->transportsGallery($request, $transports->id, $features_image);
        return redirect()->route('transports.list')->with('success', translate('Transport saved successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $page_title = translate('Edit Transport');
        $lang = $request->lang;
        $transportSingle = Transport::findOrFail($id);
        $data['faqs'] = $transportSingle->faqs ? json_decode($transportSingle->faqs) : NULL;
        $data['service_fees'] = $transportSingle->service_fees ? json_decode($transportSingle->service_fees) : NULL;
        $data['includes'] = $transportSingle->includes ? json_decode($transportSingle->includes) : NULL;
        $data['excludes'] = $transportSingle->excludes ? json_decode($transportSingle->excludes) : NULL;
        $data['attribute_terms'] = $transportSingle->attribute_terms ? json_decode($transportSingle->attribute_terms) : NULL;
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $galleries = TransportGallery::where('transport_id', $id)->get();
        $attributes = TransportAttribute::orderBy('name', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.transports.edit', compact('data', 'authors', 'page_title', 'transportSingle', 'lang', 'galleries', 'attributes', 'countries'));
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
            'youtube_video' => 'nullable',
            'distance_km' => 'nullable|numeric',
            'min_advance_reservations' => 'nullable|max:255',
            'min_stay' => 'nullable|max:255',
            'car_type' => 'nullable|max:255',
            'car_price' => 'nullable|max:255',
            'car_sale_price' => 'nullable|max:255',
            'car_person' => 'nullable|max:255',
            'bus_price' => 'nullable|max:255',
            'bus_sale_price' => 'nullable|max:255',
            'bus_child_price' => 'nullable|max:255',
            'train_price' => 'nullable|max:255',
            'train_sale_price' => 'nullable|max:255',
            'train_child_price' => 'nullable|max:255',
            'boat_price' => 'nullable|max:255',
            'boat_sale_price' => 'nullable|max:255',
            'boat_child_price' => 'nullable|max:255',
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
            'faq_title' => 'nullable|max:255',
            'include_title' => 'nullable|max:255',
            'exclude_title' => 'nullable|max:255',
        ]);

        if ($request->hasFile('features_image')) {
            $validator = Validator::make($request->all(), [
                'features_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transports = Transport::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $transports->title = $request->title;
            $transports->content = Purifier::clean($request->content);
        }
        /** Features image upload */
        $features_image = $request->file('features_image');
        if ($features_image != '') {
            if ($transports->feature_img && file_exists(public_path('uploads/transports/features/' . $transports->feature_img))) {
                unlink(public_path('uploads/transports/features/' . $transports->feature_img));
            }
            $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
            $features_image->move(public_path('uploads/transports/features'), $features_image_name);
            $transports->feature_img = $features_image_name;
        }
        /** Meta image upload */
        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                if (file_exists(public_path('uploads/transports/meta/' . $transports->meta_img))) {
                    unlink(public_path('uploads/transports/meta/' . $transports->meta_img));
                }
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/transports/meta'), $meta_img_name);
                $transports->meta_img = $meta_img_name;
            }
        }

        $transports->youtube_video = $request->youtube_video;
        $transports->distance_km = $request->distance_km;
        $transports->min_advance_reservations = $request->min_advance_reservations;
        $transports->min_stay = $request->min_stay;
        $transports->car_type = $request->car_type;
        $transports->car_price = $request->car_price ?? 0;
        $transports->car_sale_price = $request->car_sale_price ?? 0;
        $transports->car_person = $request->car_person;
        $transports->bus_price = $request->bus_price ?? 0;
        $transports->bus_sale_price = $request->bus_sale_price ?? 0;
        $transports->bus_child_price = $request->bus_child_price ?? 0;
        $transports->train_price = $request->train_price ?? 0;
        $transports->train_sale_price = $request->train_sale_price ?? 0;
        $transports->train_child_price = $request->train_child_price ?? 0;
        $transports->boat_price = $request->boat_price ?? 0;
        $transports->boat_sale_price = $request->boat_sale_price ?? 0;
        $transports->boat_child_price = $request->boat_child_price ?? 0;
        $transports->enable_service_fee = $request->enable_service_fee ? $request->enable_service_fee : 2;
        $transports->address = $request->address;
        $transports->faq_title = $request->faq_title;
        $transports->include_title = $request->include_title;
        $transports->exclude_title = $request->exclude_title;
        $transports->country_id = $request->country_id;
        $transports->state_id = $request->state_id;
        $transports->city_id = $request->city_id;
        $transports->zip_code = $request->zip_code;
        $transports->meta_title = $request->meta_title;
        $transports->meta_desc =  Purifier::clean($request->meta_description);
        $transports->meta_keyward = $request->meta_keyward;

        if ($user->role == 2) {
            if ($request->status == 1) {
                $transports->status = 3;
            } else {
                $transports->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $transports->status = $request->status;
        }
        $transports->enable_seo = $request->enable_seo == "on" ? 1 : null;
        $transports->faqs = json_encode($request->faqs) ?? null;
        $transports->service_fees = json_encode($request->service_fee) ?? null;
        $transports->includes = json_encode($request->includes) ?? null;
        $transports->excludes = json_encode($request->excludes) ?? null;
        $transports->attribute_terms = json_encode($request->term) ?? null;
        if ($transports->update()) {
            $transports_translation = TransportTranslation::firstOrNew(['lang' => $request->lang, 'transport_id' => $transports->id]);
            $transports_translation->title = $request->title;
            $transports_translation->content = Purifier::clean($request->content);
            $transports_translation->save();

            $this->transportsGallery($request, $transports->id, $features_image);
        }

        return redirect()->back()->with('success', translate('Transport updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transports = Transport::findOrFail($id);
        if ($transports->features_image && file_exists(public_path('uploads/transports/features/' . $transports->features_image))) {
            unlink(public_path('uploads/transports/features/' . $transports->features_image));
        }
        if ($transports->meta_img && file_exists(public_path('uploads/transports/meta/' . $transports->meta_img))) {
            unlink(public_path('uploads/transports/meta/' . $transports->meta_img));
        }

        $transports_gallery = TransportGallery::where('transport_id', $id)->get();
        if ($transports_gallery != null) {
            foreach ($transports_gallery as $agallery) {
                if(file_exists(public_path('uploads/transports/gallery/' . $agallery->image))){
                    unlink(public_path('uploads/transports/gallery/' . $agallery->image));
                }

            }
        }
        $transports->delete();
        return back()->with('success', translate('Transport deleted successfully'));
    }

    /**
     * Pending product approved.
     */
    public function approve(Request $request, $id)
    {
        $transports = Transport::findOrFail($id);
        $transports->status = 1;
        $transports->update();

        return back()->with('success', translate('Transport approved successfully'));
    }

    /**
     * Change Hotel status.
     */

    public function changeStatus()
    {
        $status         = $_POST['status'];
        $transportId     = $_POST['dataId'];

        if ($status && $transportId) {
            $transports = Transport::findOrFail($transportId);
            if ($status == 1) {
                $transports->status = 2;
                $message = translate('Transport Inactive');
            } else {
                $transports->status = 1;
                $message = translate('Transport Active');
            }
        }
        if ($transports->update()) {
            $response = array('output' => 'success', 'statusId' => $transports->status, 'dataId' => $transports->id, 'message' => $message);
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
            $gallery = TransportGallery::findOrFail($dataId);
            if (file_exists(public_path('uploads/transports/gallery/' . $gallery->image))) {
                unlink(public_path('uploads/transports/gallery/' . $gallery->image));
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
    public function transportsGallery($request, $transport_id, $features_image)
    {
        if ($request->file('image')) {
            $allowedfileExtension = ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'];
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $transports_gallery = new TransportGallery;
                    $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/transports/gallery'), $image_name);
                    $transports_gallery->image = $image_name;
                    $transports_gallery->transport_id = $transport_id;
                    $transports_gallery->save();
                }
            }
        }
    }

    public function review(Request $request, $id)
    {
        $user = Auth::user();
        $page_title = translate('Reviews');
        $lang = $request->lang;
        if ($user->role == 2) {
            $transportReviews = Review::where('product_type', 'transports')->where('product_id', $id)->whereNull('parent_id')->where('author_id', $user->id)->latest()->paginate(10)->withQueryString();
        } else {
            $transportReviews = Review::where('product_type', 'transports')->where('product_id', $id)->whereNull('parent_id')->latest()->paginate(10)->withQueryString();
        }

        return view('backend.transports.reviews', compact('page_title', 'transportReviews', 'lang'));
    }

    public function reply(Request $request)
    {
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
        $transportData        = $_POST['dataId'];

        if ($status && $transportData) {
            $review = Review::findOrFail($transportData);
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
