<?php

namespace App\Http\Controllers;

use App\Models\TourCategory;
use App\Models\TourCategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class TourCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $lang = $request->lang;
        $page_title = translate('Tour Categories');
        $categories = TourCategory::latest()->paginate(10)->withQueryString();
        return view('backend.tours.category.index', compact('page_title', 'categories', 'lang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'icon' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new TourCategory;
        $category->name = Purifier::clean($request->name);

        $slug = Str::slug($request->name, '-');
        $same_slug_count = TourCategory::where('slug', 'LIKE', $slug . '%')->count();
        $slug_suffix = $same_slug_count ? '-' . $same_slug_count + 1 : '';
        $slug .= $slug_suffix;
        $category->slug = $slug;
        $category->icon = $request->icon;
        $category->save();
        return redirect()->back()->with('success', translate('Tour Category saved successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $page_title = translate('Edit Tour Category');
        $lang = $request->lang;
        $categorySingle = TourCategory::findOrFail($id);
        return view('backend.tours.category.edit', compact('page_title', 'categorySingle', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'icon' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = TourCategory::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $category->name = Purifier::clean($request->name);
        }

        $category->icon = $request->icon;
        if($category->update()){

        $category_translation = TourCategoryTranslation::firstOrNew(['lang' => $request->lang, 'category_id' => $category->id]);
        $category_translation->name = Purifier::clean($request->name);
        $category_translation->save();
        }

        return redirect()->route('tour.category.list')->with('success', translate('Tour Category has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = TourCategory::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', translate('Tour Category deleted successfully'));
    }

    /**
     * Change Hotel status.
     */

     public function changeStatus()
     {
         $status         = $_POST['status'];
         $categoryId     = $_POST['dataId'];
 
         if ($status && $categoryId) {
             $category = TourCategory::findOrFail($categoryId);
             if ($status == 1) {
                 $category->status = 2;
                 $message = translate('Tour Category Deactive');
             } else {
                 $category->status = 1;
                 $message = translate('Tour Category Active');
             }
         }
         if ($category->update()) {
             $response = array('output' => 'success', 'statusId' => $category->status, 'dataId' => $category->id, 'message' => $message);
             return response()->json($response);
         }
     }
}
