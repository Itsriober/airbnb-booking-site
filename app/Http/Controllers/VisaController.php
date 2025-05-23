<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use App\Models\Visa;
use App\Models\VisaCategory;
use App\Models\VisaTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Inquiry;
use Mews\Purifier\Facades\Purifier;

class VisaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $page_title = translate('Visa List');
        if ($user->role == 2) {
            $visa = Visa::where('author_id', $user->id)->when($request->search, function ($q) use ($request) {
                $category = VisaCategory::where('name', request('search'))->first();
                return $q->where('country_id', 'like', '%' . $request->search . '%')
                    ->orWhere('category_id', $category?->id)
                    ->orWhere('cost', 'like', '%' . $request->search . '%')
                    ->orWhere('title', 'like', '%' . $request->search . '%');
            })->latest()->paginate(10)->withQueryString();

            $data['total_visa'] = Visa::where('author_id', $user->id)->count();
            $data['total_active'] = Visa::where('author_id', $user->id)->where('status', 1)->count();
            $data['total_type'] = VisaCategory::count();
            $data['total_inquiry'] = Inquiry::where('author_id', $user->id)->where('type', 'visa')->count();
        } else {
            $visa = Visa::when($request->search, function ($q) use ($request) {
                $category = VisaCategory::where('name', request('search'))->first();
                return $q->where('country_id', 'like', '%' . $request->search . '%')
                    ->orWhere('category_id', $category?->id)
                    ->orWhere('cost', 'like', '%' . $request->search . '%')
                    ->orWhere('title', 'like', '%' . $request->search . '%');
            })->latest()->paginate(10)->withQueryString();

            $data['total_visa'] = Visa::count();
            $data['total_active'] = Visa::where('status', 1)->count();
            $data['total_type'] = VisaCategory::count();
            $data['total_inquiry'] = Inquiry::where('type', 'visa')->count();
        }

        $visa->withQueryString();

        return view('backend.visa.index', compact('page_title', 'visa', 'data'));
    }

    public function create()
    {
        $page_title = translate('Add Visa');
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        $categories = VisaCategory::where('status',1)->get();
        return view('backend.visa.create', compact('page_title', 'authors', 'countries','categories'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'title'             => 'required|max:255',
            'category_id'         => 'required|max:255',
            'maximum_stay'      => 'required|max:255',
            'visa_mode'         => 'required|max:255',
            'processing'        => 'required|max:255',
            'validity'          => 'required|max:255',
            'cost'              => 'required|numeric',
            'country_id'        => 'nullable|max:255',
            'meta_title'        => 'nullable|max:255',
            'meta_description'  => 'nullable',
            'meta_img'          => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'features_image'    => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'status'            => 'required|max:255',
        ]);

        if ($request->hasFile('features_image')) {
            $validator = Validator::make($request->all(), [
                'features_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $visa = new Visa;

        if ($request->hasFile('features_image')) {
            $features_image = $request->file('features_image');
            if ($features_image != '') {
                $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
                $features_image->move(public_path('uploads/visa/features'), $features_image_name);
                $visa->features_image = $features_image_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/visa/meta'), $meta_img_name);
                $visa->meta_img = $meta_img_name;
            }
        }

        $visa->title = $request->title;

        $slug = Str::slug($request->title, '-');
        $same_slug_count = Visa::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;
        $visa->slug = $slug;

        $visa->category_id    = $request->category_id;
        $visa->maximum_stay = $request->maximum_stay;
        $visa->visa_mode    = $request->visa_mode;
        $visa->processing   = $request->processing;
        $visa->validity     = $request->validity;
        $visa->cost         = $request->cost;
        $visa->country_id   = $request->country_id;
        $visa->meta_title   = $request->meta_title;
        $visa->meta_desc    = Purifier::clean($request->meta_description);
        if ($user->role == 2) {
            $visa->author_id = $user->id;
            if ($request->status == 1) {
                $visa->status = 3;
            } else {
                $visa->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $visa->author_id = $request->author_id;
            $visa->status = $request->status;
        }
        $visa->enable_seo = $request->enable_seo == "on" ? 1 : null;
        $visa->faqs       = json_encode($request->faqs) ?? null;
        $visa->includes   = json_encode($request->includes) ?? null;
        $visa->save();

        return redirect()->route('visa.list')->with('success', translate('Tour saved successfully'));
    }

    public function edit(Request $request, $id)
    {
        $page_title = translate('Visa Edit');
        $lang = $request->lang;

        $visaSingle = Visa::findOrfail($id);
        $data['faqs'] = json_decode($visaSingle->faqs);
        $data['includes'] = json_decode($visaSingle->includes);
        $authors = User::where('role', 2)->orderBy('username', 'asc')->get();
        $countries = Location::where('country_id', null)->where('state_id', null)->get();
        $categories = VisaCategory::where('status',1)->get();
        return view('backend.visa.edit', compact('page_title', 'data', 'visaSingle', 'authors', 'countries', 'lang','categories'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'title'             => 'required|max:255',
            'category_id'         => 'required|max:255',
            'maximum_stay'      => 'required|max:255',
            'visa_mode'         => 'required|max:255',
            'processing'        => 'required|max:255',
            'validity'          => 'required|max:255',
            'cost'              => 'required|numeric',
            'country_id'        => 'nullable|max:255',
            'meta_title'        => 'nullable|max:255',
            'meta_description'  => 'nullable',
            'meta_img'          => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'status'            => 'required|max:255',
        ]);

        if ($request->hasFile('features_image')) {
            $validator = Validator::make($request->all(), [
                'features_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $visa = Visa::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $visa->title = $request->title;
        }

        if ($request->hasFile('features_image')) {
            $features_image = $request->file('features_image');
            if ($features_image != '') {
                $features_image_name = pathinfo($features_image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $features_image->getClientOriginalExtension();
                $features_image->move(public_path('uploads/visa/features'), $features_image_name);
                $visa->features_image = $features_image_name;
            }
        }

        if ($request->hasFile('meta_img')) {
            $meta_img = $request->file('meta_img');
            if ($meta_img != '') {
                $meta_img_name = pathinfo($meta_img->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $meta_img->getClientOriginalExtension();
                $meta_img->move(public_path('uploads/visa/meta'), $meta_img_name);
                $visa->meta_img = $meta_img_name;
            }
        }

        $visa->title        = $request->title;
        $visa->category_id    = $request->category_id;
        $visa->maximum_stay = $request->maximum_stay;
        $visa->visa_mode    = $request->visa_mode;
        $visa->processing   = $request->processing;
        $visa->validity     = $request->validity;
        $visa->cost         = $request->cost;
        $visa->country_id   = $request->country_id;
        $visa->meta_title   = $request->meta_title;
        $visa->meta_desc    = Purifier::clean($request->meta_description);
        if ($user->role == 2) {
            $visa->author_id = $user->id;
            if ($request->status == 1) {
                $visa->status = 3;
            } else {
                $visa->status = $request->status;
            }
        } elseif ($user->role == 3 || $user->role == 4) {
            $visa->author_id = $request->author_id;
            $visa->status = $request->status;
        }
        $visa->enable_seo = $request->enable_seo == "on" ? 1 : null;
        $visa->faqs       = json_encode($request->faqs) ?? null;
        $visa->includes   = json_encode($request->includes) ?? null;

        if ($visa->update()) {
            $visa_translation = VisaTranslation::firstOrNew(['lang' => $request->lang, 'visa_id' => $visa->id]);
            $visa_translation->title = $request->title;
            $visa_translation->save();
        }
        return redirect()->back()->with('success', translate('Visa updated successfully'));
    }

    public function destroy($id)
    {
        $visa = Visa::findOrFail($id);
        if ($visa->features_image && file_exists(public_path('uploads/visa/features/' . $visa->features_image))) {
            unlink(public_path('uploads/visa/features/' . $visa->features_image));
        }
        if ($visa->meta_img && file_exists(public_path('uploads/visa/meta/' . $visa->meta_img))) {
            unlink(public_path('uploads/visa/meta/' . $visa->meta_img));
        }

        $visa->delete();
        return back()->with('success', translate('Visa deleted successfully'));
    }

    public function changeStatus()
    {
        $status         = $_POST['status'];
        $tourId     = $_POST['dataId'];

        if ($status && $tourId) {
            $visa = Visa::findOrFail($tourId);
            if ($status == 1) {
                $visa->status = 3;
                $message = translate('Visa Deactive');
            } else {
                $visa->status = 1;
                $message = translate('Visa Active');
            }
        }
        if ($visa->update()) {
            $response = array('output' => 'success', 'statusId' => $visa->status, 'dataId' => $visa->id, 'message' => $message);
            return response()->json($response);
        }
    }

    public function approve($id)
    {
        $visa = Visa::findOrFail($id);
        $visa->status = 1;
        $visa->update();

        return back()->with('success', translate('Visa approved successfully'));
    }
}
