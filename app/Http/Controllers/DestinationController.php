<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationGallery;
use App\Models\Location;
use App\Models\DestinationTranslation;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $page_title = translate('Destination List');
        if ($user->role == 2) {
            $destinations = Destination::where('author_id', $user->id)->when($request->search, function ($q) use ($request) {
                return $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('destination', 'like', '%' . $request->search . '%')
                    ->orWhere('created_at', 'like', '%' . $request->search . '%')
                    ->orWhere('author_id', 'like', '%' . $request->search . '%');
            })->latest()->paginate(10)->withQueryString();

            $data['total_destination'] = Destination::where('author_id', $user->id)->count();
            $data['total_active'] = Destination::where('author_id', $user->id)->where('status', 1)->count();
            $data['total_tour'] = Tour::where('author_id', $user->id)->count();
            $data['total_booking'] = Tour::where('author_id', $user->id)->count();
        } else {
            $destinations = Destination::when($request->search, function ($q) use ($request) {
                $author_id = User::where('username', $request->search)->pluck('id')->first();
                if ($author_id) {
                    return $q->where('author_id', 'like', '%' . $author_id . '%');
                } else {
                    return $q->where('title', 'like', '%' . $request->search . '%')
                        ->orWhere('destination', 'like', '%' . $request->search . '%');
                }
            })->latest()->paginate(10)->withQueryString();

            $data['total_destination']  = Destination::count();
            $data['total_active']       = Destination::where('status', 1)->count();
            $data['total_tour'] = Tour::count();
            $data['total_booking'] = Tour::count();
        }

        $destinations->withQueryString();

        return view('backend.destination.index', compact('page_title', 'destinations', 'data'));
    }

    public function create()
    {
        $page_title = translate('Destination Create');
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();

        return view('backend.destination.create', compact('page_title', 'authors'));
    }

    public function store(Request $request)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'title'           => 'required|max:255',
            'content'         => 'required',
            'destination'     => 'required',
            'population'      => 'required|max:255',
            'city'            => 'nullable|max:255',
            'language'        => 'nullable|max:255',
            'currency'        => 'nullable|max:255',
            'meta_title'      => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_img'        => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'features_image'  => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'status'          => 'required|max:255',
        ]);

        $user = Auth::user();

        if ($request->hasFile('features_image')) {
            $validator = Validator::make($request->all(), [
                'features_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $destination = new Destination();

        if ($request->hasFile('features_image')) {
            $feature_img = $request->file('features_image');
            if ($feature_img != '') {
                $feature_img_name = pathinfo($feature_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $feature_img->getClientOriginalExtension();
                $feature_img->move(public_path('uploads/destination/features'), $feature_img_name);
                $destination->features_image = $feature_img_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/destination/meta'), $meta_img_name);
                $destination->meta_img = $meta_img_name;
            }
        }


        $destination->title = $request->title;

        $slug = Str::slug($request->title, '-');
        $same_slug_count = Destination::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;
        $destination->slug = $slug;

        $destination->content       = Purifier::clean($request->content);
        $destination->destination   = $request->destination;
        $destination->population    = $request->population;
        $destination->city          = $request->city;
        $destination->language      = $request->language;
        $destination->currency      = $request->currency;
        $destination->short_desc    = $request->short_desc;
        $destination->meta_title    = $request->meta_title;
        $destination->meta_desc     = Purifier::clean($request->meta_description);
        if ($user->role == 2) {
            $destination->author_id = $user->id;
            if ($request->status == 1) {
                $destination->status = 3;
            } else {
                $destination->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $destination->author_id = $request->author_id;
            $destination->status = $request->status;
        }
        $destination->enable_seo = $request->enable_seo == "on" ? 1 : null;
        $destination->save();

        if ($request->file('image')) {
            $allowedfileExtension = ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'];
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $tour_gallery = new DestinationGallery();
                    $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/destination/gallery'), $image_name);
                    $tour_gallery->image = $image_name;
                    $tour_gallery->destination_id = $destination->id;
                    $tour_gallery->save();
                }
            }
        }

        return redirect()->route('destination.list')->with('success', translate('destination saved successfully'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = translate('Destination Edit');

        $destinationSingle = Destination::findOrfail($id);
        $lang = $request->lang;
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $galleries = DestinationGallery::where('destination_id', $id)->get();

        return view('backend.destination.edit', compact('page_title', 'lang', 'destinationSingle', 'authors', 'galleries'));
    }

    public function update(Request $request, $id)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'title'           => 'required|max:255',
            'content'         => 'required',
            'destination'     => 'required',
            'population'      => 'required|max:255',
            'city'            => 'nullable|max:255',
            'language'        => 'nullable|max:255',
            'currency'        => 'nullable|max:255',
            'meta_title'      => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_img'        => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'features_image'  => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'status'          => 'required|max:255',
        ]);

        $user = Auth::user();


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $destination = Destination::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $destination->title = $request->title;
            $destination->content = Purifier::clean($request->content);
            $destination->destination = $request->destination;
        }

        if ($request->hasFile('features_image')) {
            $feature_img = $request->file('features_image');
            if ($feature_img != '') {
                $feature_img_name = pathinfo($feature_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $feature_img->getClientOriginalExtension();
                $feature_img->move(public_path('uploads/destination/features'), $feature_img_name);
                $destination->features_image = $feature_img_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/destination/meta'), $meta_img_name);
                $destination->meta_img = $meta_img_name;
            }
        }

        $destination->title       = $request->title;
        $destination->content     = Purifier::clean($request->content);
        $destination->destination = $request->destination;
        $destination->population  = $request->population;
        $destination->city        = $request->city;
        $destination->language    = $request->language;
        $destination->currency    = $request->currency;
        $destination->short_desc  = $request->short_desc;
        $destination->meta_title  = $request->meta_title;
        $destination->meta_desc   = Purifier::clean($request->meta_description);
        if ($user->role == 2) {
            $destination->author_id = $user->id;
            if ($request->status == 1) {
                $destination->status = 3;
            } else {
                $destination->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $destination->author_id = $request->author_id;
            $destination->status = $request->status;
        }
        $destination->enable_seo = $request->enable_seo == "on" ? 1 : null;
        if ($destination->update()) {
            $destination_translation = DestinationTranslation::firstOrNew(['lang' => $request->lang, 'destination_id' => $destination->id]);
            $destination_translation->title = $request->title;
            $destination_translation->content = Purifier::clean($request->content);
            $destination_translation->destination = $request->destination;
            $destination_translation->save();

            $this->DestinationGallery($request, $destination->id, $destination->features_image);
        }

        if ($request->file('image')) {
            $allowedfileExtension = ['jpeg', 'png', 'jpg', 'gif', 'svg', 'webp'];
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $tour_gallery = new DestinationGallery();
                    $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/destination/gallery'), $image_name);
                    $tour_gallery->image = $image_name;
                    $tour_gallery->destination_id = $destination->id;
                    $tour_gallery->save();
                }
            }
        }

        return redirect()->back()->with('success', translate('Destination updated successfully'));
    }

    public function DestinationGallery($request, $destinationId, $featuresImage) {}

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        if ($destination->features_image && file_exists(public_path('uploads/destination/features/' . $destination->features_image))) {
            unlink(public_path('uploads/destination/features/' . $destination->features_image));
        }
        if ($destination->meta_img && file_exists(public_path('uploads/destination/meta/' . $destination->meta_img))) {
            unlink(public_path('uploads/destination/meta/' . $destination->meta_img));
        }
        if ($destination->banner_img && file_exists(public_path('uploads/destination/banner/' . $destination->banner_img))) {
            unlink(public_path('uploads/destination/banner/' . $destination->banner_img));
        }

        $destination_gallery = DestinationGallery::where('destination_id', $id)->get();
        if ($destination_gallery != null) {
            foreach ($destination_gallery as $tgallery) {
                if(file_exists(public_path('uploads/destination/gallery/' . $tgallery->image))){
                    unlink(public_path('uploads/destination/gallery/' . $tgallery->image));
                }

            }
        }

        $destination->delete();
        return back()->with('success', translate('Destination deleted successfully'));
    }

    public function changeStatus()
    {
        $status        = $_POST['status'];
        $tourId        = $_POST['dataId'];

        if ($status && $tourId) {
            $destination = Destination::findOrFail($tourId);
            if ($status == 1) {
                $destination->status = 3;
                $message = translate('Destination Deactive');
            } else {
                $destination->status = 1;
                $message = translate('Destination Active');
            }
        }
        if ($destination->update()) {
            $response = array('output' => 'success', 'statusId' => $destination->status, 'dataId' => $destination->id, 'message' => $message);
            return response()->json($response);
        }
    }

    public function approve($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->status = 1;
        $destination->update();

        return back()->with('success', translate('Destination approved successfully'));
    }

    public function gallery_remove(Request $request)
    {
        $dataId = $_POST['dataId'];

        if ($dataId) {
            $gallery = DestinationGallery::findOrFail($dataId);
            if ($gallery->image && file_exists(public_path('uploads/destination/gallery/' . $gallery->image))) {
                unlink(public_path('uploads/destination/gallery/' . $gallery->image));
            }
            $message = translate('Gallery Image Deleted');

            if ($gallery->delete()) {
                $response = array('output' => 'success', 'dataId' => $dataId, 'message' => $message);
                return response()->json($response);
            }
        }
    }
}
