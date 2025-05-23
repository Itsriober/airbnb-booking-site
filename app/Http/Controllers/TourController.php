<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Tour;
use App\Models\Order;
use App\Models\TourGallery;
use App\Models\TourAttribute;
use App\Models\TourTranslation;
use App\Models\TourCategory;
use App\Models\User;
use App\Models\Location;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $page_title = translate('Tour List');
        if ($user->role == 2) {
            $tours = Tour::where('author_id', $user->id)
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
            $data['total_tour'] = Tour::where('author_id', $user->id)->count();
            $data['total_active'] = Tour::where('author_id', $user->id)->where('status', 1)->count();
            $data['total_booking'] = Tour::where('author_id', $user->id)->count();
            $data['total_booking_amount'] = Order::where('merchant_id', $user->id)->where('product_type', 'tour')->sum('total_with_tax');
        } else {
            $tours = Tour::when(request('search'), function ($q) {
                $location = Location::where('name', request('search'))->first();
                return $q->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('price', request('search'))
                    ->when($location != null, function ($q) use ($location) {
                        return $q->orWhere('country_id', $location->id)
                            ->orWhere('state_id', $location->id)
                            ->orWhere('city_id', $location->id);
                    });
            })->latest()->paginate(10)->withQueryString();
            
            $data['total_tour'] = Tour::count();
            $data['total_active'] = Tour::where('status', 1)->count();
            $data['total_booking'] = Order::where('product_type', 'tour')->count();
            $data['total_booking_amount'] = Order::where('product_type', 'tour')->sum('total_with_tax');
        }
        return view('backend.tours.index', compact('page_title', 'tours', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = translate('Add Tour');
        $attributes = TourAttribute::orderBy('name', 'asc')->get();
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        $categories = TourCategory::where('status', 1)->orderBy('name', 'asc')->get();
        $destinations = Destination::where('status', 1)->orderBy('destination', 'asc')->get();

        return view('backend.tours.create', compact('categories', 'attributes', 'authors', 'countries', 'page_title', 'destinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'shoulder' => 'required|max:255',
            'content' => 'required',
            'youtube_image' => 'nullable',
            'youtube_video' => 'nullable',
            'category_id' => 'required|max:255',
            'destination_id' => 'required|max:255',
            'sub_destination' => 'nullable',
            'min_people' => 'nullable|max:255',
            'max_people' => 'nullable|max:255',
            'min_advance_reservations' => 'nullable|max:255',
            'cancellation' => 'nullable|max:255',
            'price' => 'required|max:255',
            'sale_price' => 'nullable|max:255',
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

        if ($request->hasFile('features_image')) {
            $validator = Validator::make($request->all(), [
                'features_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tours = new Tour;

        if ($request->hasFile('features_image')) {
            $features_image = $request->file('features_image');
            if ($features_image != '') {
                $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
                $features_image->move(public_path('uploads/tour/features'), $features_image_name);
                $tours->features_image = $features_image_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/tour/meta'), $meta_img_name);
                $tours->meta_img = $meta_img_name;
            }
        }
        if ($request->hasFile('youtube_image')) {
            $youtube_image = $request->file('youtube_image');
            if ($youtube_image != '') {
                $youtube_image_name = pathinfo($youtube_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $youtube_image->getClientOriginalExtension();
                $youtube_image->move(public_path('uploads/tour/youtube'), $youtube_image_name);
                $tours->youtube_image = $youtube_image_name;
            }
        }

        $tours->title = $request->title;

        $slug = Str::slug($request->title, '-');
        $same_slug_count = Tour::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;
        $tours->slug = $slug;

        $tours->shoulder = $request->shoulder;
        $tours->content = Purifier::clean($request->content);
        $tours->youtube_video = $request->youtube_video;
        $tours->category_id = $request->category_id;
        $tours->destination_id = $request->destination_id;
        $tours->sub_destination = $request->sub_destination;
        $tours->min_people = $request->min_people;
        $tours->max_people = $request->max_people;
        $tours->min_advance_reservations = $request->min_advance_reservations;
        $tours->cancellation = $request->cancellation;
        $tours->price = $request->price;
        $tours->sale_price = $request->sale_price ?? 0;
        $tours->child_price = $request->child_price ?? 0;
        $tours->enable_service_fee = $request->enable_service_fee ? $request->enable_service_fee : 2;
        $tours->enable_fixed_dates = $request->enable_fixed_dates ? $request->enable_fixed_dates : 2;
        $tours->enable_open_hours = $request->enable_open_hours ? $request->enable_open_hours : 2;
        $tours->address = $request->address;
        $tours->country_id = $request->country_id;
        $tours->state_id = $request->state_id;
        $tours->city_id = $request->city_id;
        $tours->zip_code = $request->zip_code;
        $tours->map_lat = $request->map_lat;
        $tours->map_lng = $request->map_lng;
        $tours->fixed_dates = $request->fixed_date ? json_encode($request->fixed_date) : NULL;
        $tours->meta_title = $request->meta_title;
        $tours->meta_desc =  Purifier::clean($request->meta_description);
        $tours->meta_keyward = $request->meta_keyward;
        if ($user->role == 2) {
            $tours->author_id = $user->id;
            if ($request->status == 1) {
                $tours->status = 3;
            } else {
                $tours->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $tours->author_id = $request->author_id;
            $tours->status = $request->status;
        }

        $tours->enable_seo = $request->enable_seo == "on" ? 1 : NULL;
        $tours->faq_title = $request->faq_title;
        $tours->include_title = $request->include_title;
        $tours->exclude_title = $request->exclude_title;
        $tours->highlight_title = $request->highlight_title;
        $tours->itinerary_title = $request->itinerary_title;
        $tours->faqs = $request->faqs ? json_encode($request->faqs) : NULL;
        $tours->includes = $request->includes ? json_encode($request->includes) : NULL;
        $tours->excludes = $request->excludes ? json_encode($request->excludes) : NULL;
        $tours->highlights = $request->highlights ? json_encode($request->highlights) : NULL;
        $tours->itinerary = $request->itinerary ? json_encode($request->itinerary) : NULL;
        $tours->open_hours = $request->open_hours ? json_encode($request->open_hours) : NULL;
        $tours->service_fees = $request->service_fee ? json_encode($request->service_fee) : NULL;
        $tours->attribute_terms = $request->term ? json_encode($request->term) : NULL;
        $tours->save();
        $this->tourGallery($request, $tours->id, $features_image);
        return redirect()->route('tours.list')->with('success', translate('Tour saved successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $page_title = translate('Edit Tour');
        $lang = $request->lang;
        $tourSingle = Tour::findOrFail($id);
        $data['faqs'] = $tourSingle->faqs ? json_decode($tourSingle->faqs) : NULL;
        $data['includes'] = $tourSingle->includes ? json_decode($tourSingle->includes) : NULL;
        $data['excludes'] = $tourSingle->excludes ? json_decode($tourSingle->excludes) : NULL;
        $data['highlights'] = $tourSingle->highlights ? json_decode($tourSingle->highlights) : NULL;
        $data['itinerary'] = $tourSingle->itinerary ? json_decode($tourSingle->itinerary) : NULL;
        $data['service_fees'] = $tourSingle->service_fees ? json_decode($tourSingle->service_fees) : NULL;
        $data['attribute_terms'] = $tourSingle->attribute_terms ? json_decode($tourSingle->attribute_terms) : NULL;
        $data['open_hours'] = $tourSingle->open_hours ? json_decode($tourSingle->open_hours) : NULL;
        $data['fixed_dates'] = $tourSingle->fixed_dates ? json_decode($tourSingle->fixed_dates) : NULL;
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $galleries = TourGallery::where('tour_id', $id)->get();
        $attributes = TourAttribute::orderBy('name', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        $categories = TourCategory::where('status', 1)->orderBy('name', 'asc')->get();
        $destinations = Destination::where('status', 1)->orderBy('destination', 'asc')->get();
        return view('backend.tours.edit', compact('data', 'authors', 'page_title', 'tourSingle', 'lang', 'galleries', 'attributes', 'countries', 'categories', 'destinations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'shoulder' => 'required|max:255',
            'content' => 'required',
            'youtube_image' => 'nullable',
            'youtube_video' => 'nullable',
            'category_id' => 'required|max:255',
            'destination_id' => 'required|max:255',
            'sub_destination' => 'nullable',
            'min_people' => 'nullable|max:255',
            'max_people' => 'nullable|max:255',
            'min_advance_reservations' => 'nullable|max:255',
            'cancellation' => 'nullable|max:255',
            'price' => 'required|max:255',
            'sale_price' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'country_id' => 'nullable|max:255',
            'state_id' => 'nullable|max:255',
            'city_id' => 'nullable|max:255',
            'zip_code' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keyward' => 'nullable',
            'meta_img' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'features_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'image' => 'nullable',
            'status' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tours = Tour::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $tours->title = $request->title;
            $tours->shoulder = $request->shoulder;
            $tours->content = Purifier::clean($request->content);
        }

        if ($request->hasFile('features_image')) {
            $features_image = $request->file('features_image');
            if ($features_image != '') {
                if (file_exists(public_path('uploads/tour/features/' . $tours->features_image))) {
                    unlink(public_path('uploads/tour/features/' . $tours->features_image));
                }
                $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
                $features_image->move(public_path('uploads/tour/features'), $features_image_name);
                $tours->features_image = $features_image_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                if ($tours->meta_img && file_exists(public_path('uploads/tour/meta/' . $tours->meta_img))) {
                    unlink(public_path('uploads/tour/meta/' . $tours->meta_img));
                }
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/tour/meta'), $meta_img_name);
                $tours->meta_img = $meta_img_name;
            }
        }
        if ($request->hasFile('youtube_image')) {
            $youtube_image = $request->file('youtube_image');
            if ($youtube_image != '') {
                if ($tours->youtube_image && file_exists(public_path('uploads/tour/youtube/' . $tours->youtube_image))) {
                    unlink(public_path('uploads/tour/youtube/' . $tours->youtube_image));
                }
                $youtube_image_name = pathinfo($youtube_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $youtube_image->getClientOriginalExtension();
                $youtube_image->move(public_path('uploads/tour/youtube'), $youtube_image_name);
                $tours->youtube_image = $youtube_image_name;
            }
        }


        $tours->youtube_video = $request->youtube_video;
        $tours->category_id = $request->category_id;
        $tours->destination_id = $request->destination_id;
        $tours->sub_destination = $request->sub_destination;
        $tours->min_people = $request->min_people;
        $tours->max_people = $request->max_people;
        $tours->min_advance_reservations = $request->min_advance_reservations;
        $tours->cancellation = $request->cancellation;
        $tours->price = $request->price;
        $tours->sale_price = $request->sale_price ?? 0;
        $tours->child_price = $request->child_price ?? 0;
        $tours->enable_service_fee = $request->enable_service_fee ? $request->enable_service_fee : 2;
        $tours->enable_fixed_dates = $request->enable_fixed_dates ? $request->enable_fixed_dates : 2;
        $tours->enable_open_hours = $request->enable_open_hours ? $request->enable_open_hours : 2;

        $tours->fixed_dates = $request->fixed_date ? json_encode($request->fixed_date) : NULL;
        $tours->address = $request->address;
        $tours->country_id = $request->country_id;
        $tours->state_id = $request->state_id;
        $tours->city_id = $request->city_id;
        $tours->zip_code = $request->zip_code;
        $tours->map_lat = $request->map_lat;
        $tours->map_lng = $request->map_lng;
        $tours->meta_title = $request->meta_title;
        $tours->meta_desc =  Purifier::clean($request->meta_description);
        $tours->meta_keyward = $request->meta_keyward;
        if ($user->role == 2) {
            $tours->author_id = $user->id;
            if ($request->status == 1) {
                $tours->status = 3;
            } else {
                $tours->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $tours->author_id = $request->author_id;
            $tours->status = $request->status;
        }

        $tours->enable_seo = $request->enable_seo == "on" ? 1 : NULL;
        $tours->faq_title = $request->faq_title;
        $tours->include_title = $request->include_title;
        $tours->exclude_title = $request->exclude_title;
        $tours->highlight_title = $request->highlight_title;
        $tours->itinerary_title = $request->itinerary_title;
        $tours->faqs = $request->faqs ? json_encode($request->faqs) : NULL;
        $tours->includes = $request->includes ? json_encode($request->includes) : NULL;
        $tours->excludes = $request->excludes ? json_encode($request->excludes) : NULL;
        $tours->highlights = $request->highlights ? json_encode($request->highlights) : NULL;
        $tours->itinerary = $request->itinerary ? json_encode($request->itinerary) : NULL;
        $tours->open_hours = $request->open_hours ? json_encode($request->open_hours) : NULL;
        $tours->service_fees = $request->service_fee ? json_encode($request->service_fee) : NULL;
        $tours->attribute_terms = $request->term ? json_encode($request->term) : NULL;
        if ($tours->update()) {
            $tour_translation = TourTranslation::firstOrNew(['lang' => $request->lang, 'tour_id' => $tours->id]);
            $tour_translation->title = $request->title;
            $tour_translation->shoulder = $request->shoulder;
            $tour_translation->content = Purifier::clean($request->content);
            $tour_translation->save();

            $this->tourGallery($request, $tours->id, $tours->features_image);
        }

        return redirect()->back()->with('success', translate('Tour updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tours = Tour::findOrFail($id);
        if ($tours->features_image && file_exists(public_path('uploads/tour/features/' . $tours->features_image))) {
            unlink(public_path('uploads/tour/features/' . $tours->features_image));
        }
        if ($tours->meta_img && file_exists(public_path('uploads/tour/meta/' . $tours->meta_img))) {
            unlink(public_path('uploads/tour/meta/' . $tours->meta_img));
        }

        if ($tours->itinerary) {
            foreach (json_decode($tours->itinerary) as $itin) {
                if (file_exists(public_path('uploads/tour/itinerary/' . $itin->image))) {
                    unlink(public_path('uploads/tour/itinerary/' . $itin->image));
                }
            }
        }
        $tour_gallery = TourGallery::where('tour_id', $id)->get();
        if ($tour_gallery != null) {
            foreach ($tour_gallery as $tgallery) {
                if(file_exists(public_path('uploads/tour/gallery/' . $tgallery->image))){
                    unlink(public_path('uploads/tour/gallery/' . $tgallery->image));
                }

            }
        }
        $tours->delete();
        return back()->with('success', translate('Tour deleted successfully'));
    }

    /**
     * Pending product approved.
     */
    public function approve(Request $request, $id)
    {
        $tours = Tour::findOrFail($id);
        $tours->status = 1;
        $tours->update();

        return back()->with('success', translate('Tour approved successfully'));
    }

    /**
     * Change Tour status.
     */

    public function changeStatus()
    {
        $status         = $_POST['status'];
        $tourId     = $_POST['dataId'];

        if ($status && $tourId) {
            $tours = Tour::findOrFail($tourId);
            if ($status == 1) {
                $tours->status = 3;
                $message = translate('Tour Deactive');
            } else {
                $tours->status = 1;
                $message = translate('Tour Active');
            }
        }
        if ($tours->update()) {
            $response = array('output' => 'success', 'statusId' => $tours->status, 'dataId' => $tours->id, 'message' => $message);
            return response()->json($response);
        }
    }
    /**
     * Change Tour featured.
     */

     public function changeFeatured()
     {
         $status         = $_POST['status'];
         $tourId     = $_POST['dataId'];

         if ($status && $tourId) {
             $tours = Tour::findOrFail($tourId);
             if ($status == 1) {
                 $tours->is_featured = 2;
                 $message = translate('Tour Unfeatured');
             } else {
                 $tours->is_featured = 1;
                 $message = translate('Tour Featured');
             }
         }
         if ($tours->update()) {
             $response = array('output' => 'success', 'statusId' => $tours->is_featured, 'dataId' => $tours->id, 'message' => $message);
             return response()->json($response);
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
    public function tourGallery($request, $tour_id, $features_image)
    {
        if ($request->file('image')) {
            $allowedfileExtension = ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'];
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $tour_gallery = new TourGallery;
                    $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/tour/gallery'), $image_name);
                    $tour_gallery->image = $image_name;
                    $tour_gallery->tour_id = $tour_id;
                    $tour_gallery->save();
                }
            }
        }
    }

    /**
     * Gallery image remove.
     */

    public function gallery_remove()
    {
        $dataId = $_POST['dataId'];

        if ($dataId) {
            $gallery = TourGallery::findOrFail($dataId);
            if (file_exists(public_path('uploads/tour/gallery/' . $gallery->image))) {
                unlink(public_path('uploads/tour/gallery/' . $gallery->image));
            }
            $message = translate('Gallery Image Deleted');

            if ($gallery->delete()) {
                $response = array('output' => 'success', 'dataId' => $dataId, 'message' => $message);
                return response()->json($response);
            }
        }
    }

    public function review(Request $request, $id)
    {
        $user = Auth::user();
        $page_title = translate('Reviews');
        $lang = $request->lang;
        if ($user->role == 2) {
            $tourReviews = Review::where('product_type', 'tour')->where('product_id', $id)->whereNull('parent_id')->where('author_id', $user->id)->latest()->paginate(10)->withQueryString();
        } else {
            $tourReviews = Review::where('product_type', 'tour')->where('product_id', $id)->whereNull('parent_id')->latest()->paginate(10)->withQueryString();
        }
        return view('backend.tours.reviews', compact('page_title', 'tourReviews', 'lang'));
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
        $tourId     = $_POST['dataId'];

        if ($status && $tourId) {
            $review = Review::findOrFail($tourId);
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
