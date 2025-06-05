<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ActivitiesGallery;
use App\Models\ActivitiesAttribute;
use App\Models\ActivitiesTranslation;
use App\Models\User;
use App\Models\Location;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $page_title = translate('Experiences List');
        if ($user->role == 2) {
            $activities = Activities::where('author_id', $user->id)
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

            $data['total_activities'] = Activities::where('author_id', $user->id)->count();
            $data['total_active'] = Activities::where('author_id', $user->id)->where('status', 1)->count();
            $data['total_booking'] = Order::where('merchant_id', $user->id)->where('product_type', 'activities')->count();
            $data['total_booking_amount'] = Order::where('merchant_id', $user->id)->where('product_type', 'activities')->sum('total_with_tax');
        } else {
            $activities = Activities::when(request('search'), function ($q) {
                $location = Location::where('name', request('search'))->first();
                return $q->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('price', request('search'))
                    ->when($location != null, function ($q) use ($location) {
                        return $q->orWhere('country_id', $location->id)
                            ->orWhere('state_id', $location->id)
                            ->orWhere('city_id', $location->id);
                    });
            })->latest()->paginate(10)->withQueryString();

            $data['total_activities'] = Activities::count();
            $data['total_active'] = Activities::where('status', 1)->count();
            $data['total_booking'] = Order::where('product_type', 'activities')->count();
            $data['total_booking_amount'] = Order::where('product_type', 'activities')->sum('total_with_tax');
        }
        return view('backend.activities.index', compact('page_title', 'activities', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = translate('Add Activities');
        $attributes = ActivitiesAttribute::orderBy('name', 'asc')->get();
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.activities.create', compact('attributes', 'authors', 'countries', 'page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'shoulder' => 'required|max:40',
            'content' => 'required',
            'youtube_image' => 'nullable',
            'youtube_video' => 'nullable',
            'days' => 'nullable|max:255',
            'nights' => 'nullable|max:255',
            'max_people' => 'nullable|max:255',
            'min_advance_reservations' => 'nullable|max:255',
            'min_stay' => 'nullable|max:255',
            'price' => 'required|max:255',
            'sale_price' => 'nullable|max:255',
            'child_price' => 'nullable|max:255',
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
            'plan_title' => 'nullable|max:191',
            'faq_title' => 'nullable|max:191',
            'highlight_title' => 'nullable|max:191',
            'include_title' => 'nullable|max:191',
            'exclude_title' => 'nullable|max:191',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $activities = new Activities;

        if ($request->hasFile('features_image')) {
            $features_image = $request->file('features_image');
            if ($features_image != '') {
                $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
                $features_image->move(public_path('uploads/activities/features'), $features_image_name);
                $activities->feature_img = $features_image_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/activities/meta'), $meta_img_name);
                $activities->meta_img = $meta_img_name;
            }
        }
        if ($request->hasFile('youtube_image')) {
            $youtube_image = $request->file('youtube_image');
            if ($youtube_image != '') {
                $youtube_image_name = pathinfo($youtube_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $youtube_image->getClientOriginalExtension();
                $youtube_image->move(public_path('uploads/activities/youtube'), $youtube_image_name);
                $activities->youtube_image = $youtube_image_name;
            }
        }

        $activities->title = $request->title;

        $slug = Str::slug($request->title, '-');
        $same_slug_count = Activities::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;
        $activities->slug = $slug;

        $activities->shoulder = $request->shoulder;
        $activities->content = Purifier::clean($request->content);
        $activities->youtube_video = $request->youtube_video;
        $activities->days = $request->days;
        $activities->nights = $request->nights;
        $activities->max_people = $request->max_people;
        $activities->min_advance_reservations = $request->min_advance_reservations;
        $activities->min_stay = $request->min_stay;
        $activities->price = $request->price;
        $activities->sale_price = $request->sale_price ?? 0;
        $activities->child_price = $request->child_price ?? 0;
        $activities->enable_service_fee = $request->enable_service_fee ? $request->enable_service_fee : 2;
        $activities->address = $request->address;
        $activities->plan_title = $request->plan_title;
        $activities->faq_title = $request->faq_title;
        $activities->highlight_title = $request->highlight_title;
        $activities->include_title = $request->include_title;
        $activities->exclude_title = $request->exclude_title;
        $activities->country_id = $request->country_id;
        $activities->state_id = $request->state_id;
        $activities->city_id = $request->city_id;
        $activities->zip_code = $request->zip_code;
        $activities->map_lat = $request->map_lat;
        $activities->map_lng = $request->map_lng;
        $activities->meta_title = $request->meta_title;
        $activities->meta_desc =  Purifier::clean($request->meta_description);
        $activities->meta_keyward = $request->meta_keyward;

        if ($user->role == 2) {
            $activities->author_id = $user->id;
            if ($request->status == 1) {
                $activities->status = 3;
            } else {
                $activities->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $activities->author_id = $request->author_id;
            $activities->status = $request->status;
        }
        $activities->enable_seo = $request->enable_seo == "on" ? 1 : NULL;
        $activities->faqs = json_encode($request->faqs) ?? NULL;
        $activities->service_fees = json_encode($request->service_fee) ?? NULL;
        $activities->includes = json_encode($request->includes) ?? NULL;
        $activities->excludes = json_encode($request->excludes) ?? NULL;
        $activities->highlights = json_encode($request->highlights) ?? NULL;
        $activities->activities_plan = json_encode($request->activities_plan) ?? NULL;
        $activities->attribute_terms = json_encode($request->term) ?? NULL;
        $activities->save();
        $this->activitiesGallery($request, $activities->id, $features_image);

        return redirect()->route('activities.list')->with('success', translate('Activities saved successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $page_title = translate('Edit Activities');
        $lang = $request->lang;
        $activitiesSingle = Activities::findOrFail($id);
        $data['faqs'] = json_decode($activitiesSingle->faqs);
        $data['extra_prices'] = json_decode($activitiesSingle->extra_prices);
        $data['service_fees'] = json_decode($activitiesSingle->service_fees);
        $data['includes'] = json_decode($activitiesSingle->includes);
        $data['excludes'] = json_decode($activitiesSingle->excludes);
        $data['highlights'] = json_decode($activitiesSingle->highlights);
        $data['activities_plan'] = json_decode($activitiesSingle->activities_plan);
        $data['attribute_terms'] = json_decode($activitiesSingle->attribute_terms);
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $galleries = ActivitiesGallery::where('activities_id', $id)->get();
        $attributes = ActivitiesAttribute::orderBy('name', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        return view('backend.activities.edit', compact('data', 'authors', 'page_title', 'activitiesSingle', 'lang', 'galleries', 'attributes', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'shoulder' => 'required|max:40',
            'content' => 'required',
            'youtube_image' => 'nullable',
            'youtube_video' => 'nullable',
            'days' => 'nullable|max:255',
            'nights' => 'nullable|max:255',
            'max_people' => 'nullable|max:255',
            'min_advance_reservations' => 'nullable|max:255',
            'min_stay' => 'nullable|max:255',
            'price' => 'required|max:255',
            'sale_price' => 'nullable|max:255',
            'child_price' => 'nullable|max:255',
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
            'plan_title' => 'nullable|max:191',
            'faq_title' => 'nullable|max:191',
            'highlight_title' => 'nullable|max:191',
            'include_title' => 'nullable|max:191',
            'exclude_title' => 'nullable|max:191',
        ]);

        if ($request->hasFile('features_image')) {
            $validator = Validator::make($request->all(), [
                'features_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $activities = Activities::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $activities->title = $request->title;
            $activities->shoulder = $request->shoulder;
            $activities->content = Purifier::clean($request->content);
        }
        /** Features image upload */
        $features_image = $request->file('features_image');
        if ($features_image != '') {
            if ($activities->feature_img && file_exists(public_path('uploads/activities/features/' . $activities->feature_img))) {
                unlink(public_path('uploads/activities/features/' . $activities->feature_img));
            }
            $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
            $features_image->move(public_path('uploads/activities/features'), $features_image_name);
            $activities->feature_img = $features_image_name;
        }
        /** Meta image upload */
        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                if ($activities->meta_img && file_exists(public_path('uploads/activities/meta/' . $activities->meta_img))) {
                    unlink(public_path('uploads/activities/meta/' . $activities->meta_img));
                }
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/activities/meta'), $meta_img_name);
                $activities->meta_img = $meta_img_name;
            }
        }

        if ($request->hasFile('youtube_image')) {
            $youtube_image = $request->file('youtube_image');
            if ($youtube_image != '') {
                if ($activities->youtube_image && file_exists(public_path('uploads/activities/youtube/' . $activities->youtube_image))) {
                    unlink(public_path('uploads/activities/youtube/' . $activities->youtube_image));
                }
                $youtube_image_name = pathinfo($youtube_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $youtube_image->getClientOriginalExtension();
                $youtube_image->move(public_path('uploads/activities/youtube'), $youtube_image_name);
                $activities->youtube_image = $youtube_image_name;
            }
        }

        $activities->youtube_video = $request->youtube_video;
        $activities->days = $request->days;
        $activities->nights = $request->nights;
        $activities->max_people = $request->max_people;
        $activities->min_advance_reservations = $request->min_advance_reservations;
        $activities->min_stay = $request->min_stay;
        $activities->price = $request->price;
        $activities->sale_price = $request->sale_price ?? 0;
        $activities->child_price = $request->child_price ?? 0;
        $activities->enable_service_fee = $request->enable_service_fee ? $request->enable_service_fee : 2;
        $activities->address = $request->address;
        $activities->country_id = $request->country_id;
        $activities->state_id = $request->state_id;
        $activities->city_id = $request->city_id;
        $activities->zip_code = $request->zip_code;
        $activities->plan_title = $request->plan_title;
        $activities->faq_title = $request->faq_title;
        $activities->highlight_title = $request->highlight_title;
        $activities->include_title = $request->include_title;
        $activities->exclude_title = $request->exclude_title;
        $activities->map_lat = $request->map_lat;
        $activities->map_lng = $request->map_lng;
        $activities->meta_title = $request->meta_title;
        $activities->meta_desc =  Purifier::clean($request->meta_description);
        $activities->meta_keyward = $request->meta_keyward;

        if ($user->role == 2) {
            if ($request->status == 1) {
                $activities->status = 3;
            } else {
                $activities->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $activities->status = $request->status;
        }
        $activities->enable_seo = $request->enable_seo == "on" ? 1 : NULL;
        $activities->faqs = json_encode($request->faqs) ?? NULL;
        $activities->service_fees = json_encode($request->service_fee) ?? NULL;
        $activities->includes = json_encode($request->includes) ?? NULL;
        $activities->excludes = json_encode($request->excludes) ?? NULL;
        $activities->highlights = json_encode($request->highlights) ?? NULL;
        $activities->activities_plan = json_encode($request->activities_plan) ?? NULL;
        $activities->attribute_terms = json_encode($request->term) ?? NULL;
        if ($activities->update()) {
            $activities_translation = ActivitiesTranslation::firstOrNew(['lang' => $request->lang, 'activities_id' => $activities->id]);
            $activities_translation->title = $request->title;
            $activities_translation->shoulder = $request->shoulder;
            $activities_translation->content = Purifier::clean($request->content);
            $activities_translation->save();

            $this->activitiesGallery($request, $activities->id, $activities->features_image);
        }

        return redirect()->back()->with('success', translate('Activities updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activities = Activities::findOrFail($id);
        if ($activities->features_image && file_exists(public_path('uploads/activities/features/' . $activities->features_image))) {
            unlink(public_path('uploads/activities/features/' . $activities->features_image));
        }
        if ($activities->meta_img && file_exists(public_path('uploads/activities/meta/' . $activities->meta_img))) {
            unlink(public_path('uploads/activities/meta/' . $activities->meta_img));
        }

        $activities_gallery = ActivitiesGallery::where('activities_id', $id)->get();
        if ($activities_gallery != null) {
            foreach ($activities_gallery as $agallery) {
                if(file_exists(public_path('uploads/activities/gallery/' . $agallery->image))){
                    unlink(public_path('uploads/activities/gallery/' . $agallery->image));
                }
            }
        }
        $activities->delete();
        return back()->with('success', translate('Activities deleted successfully'));
    }

    /**
     * Pending product approved.
     */
    public function approve(Request $request, $id)
    {
        $activities = Activities::findOrFail($id);
        $activities->status = 1;
        $activities->update();

        return back()->with('success', translate('Activities approved successfully'));
    }


    /**
     * Change Hotel status.
     */

    public function changeStatus()
    {
        $status         = $_POST['status'];
        $activitiesId     = $_POST['dataId'];

        if ($status && $activitiesId) {
            $activities = Activities::findOrFail($activitiesId);
            if ($status == 1) {
                $activities->status = 2;
                $message = translate('Activities Inactive');
            } else {
                $activities->status = 1;
                $message = translate('Activities Active');
            }
        }
        if ($activities->update()) {
            $response = array('output' => 'success', 'statusId' => $activities->status, 'dataId' => $activities->id, 'message' => $message);
            return response()->json($response);
        }
    }

    /**
     * activitiesGallery
     *
     * @param  mixed $request
     * @param  int $product_id
     * @param  mixed $features_image
     * @return Response
     */

    /**
     * Gallery image remove.
     */

    public function gallery_remove()
    {
        $dataId = $_POST['dataId'];

        if ($dataId) {
            $gallery = ActivitiesGallery::findOrFail($dataId);
            if (file_exists(public_path('uploads/activities/gallery/' . $gallery->image))) {
                unlink(public_path('uploads/activities/gallery/' . $gallery->image));
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
    public function activitiesGallery($request, $activities_id, $features_image)
    {
        if ($request->file('image')) {
            $allowedfileExtension = ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'];
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $activities_gallery = new ActivitiesGallery;
                    $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/activities/gallery'), $image_name);
                    $activities_gallery->image = $image_name;
                    $activities_gallery->activities_id = $activities_id;
                    $activities_gallery->save();
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
            $activitiesReviews = Review::where('product_type', 'activities')->where('product_id', $id)->whereNull('parent_id')->where('author_id', $user->id)->latest()->paginate(10)->withQueryString();
        } else {
            $activitiesReviews = Review::where('product_type', 'activities')->where('product_id', $id)->whereNull('parent_id')->latest()->paginate(10)->withQueryString();
        }

        return view('backend.activities.reviews', compact('page_title', 'activitiesReviews', 'lang'));
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
        $actiId        = $_POST['dataId'];

        if ($status && $actiId) {
            $review = Review::findOrFail($actiId);
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
