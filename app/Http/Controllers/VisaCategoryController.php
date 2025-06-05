<?php

namespace App\Http\Controllers;

use App\Models\VisaCategory;
use App\Models\VisaCategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class VisaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $lang = $request->lang;
        $page_title = translate('Visa Categories');
        $categories = VisaCategory::latest()->paginate(10)->withQueryString();
        return view('backend.visa.category.index', compact('page_title', 'categories', 'lang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new VisaCategory;
        $category->name = Purifier::clean($request->name);
        $category->save();
        return redirect()->back()->with('success', translate('Visa Category saved successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $page_title = translate('Edit Visa Category');
        $lang = $request->lang;
        $categorySingle = VisaCategory::findOrFail($id);
        return view('backend.visa.category.edit', compact('page_title', 'categorySingle', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = VisaCategory::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $category->name = Purifier::clean($request->name);
        }
        if($category->update()){

        $category_translation = VisaCategoryTranslation::firstOrNew(['lang' => $request->lang, 'category_id' => $category->id]);
        $category_translation->name = Purifier::clean($request->name);
        $category_translation->save();
        }

        return redirect()->route('visa.category.list')->with('success', translate('Visa Category has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = VisaCategory::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', translate('Visa Category deleted successfully'));
    }

    /**
     * Change Hotel status.
     */

     public function changeStatus()
     {
         $status         = $_POST['status'];
         $categoryId     = $_POST['dataId'];
 
         if ($status && $categoryId) {
             $category = VisaCategory::findOrFail($categoryId);
             if ($status == 1) {
                 $category->status = 2;
                 $message = translate('Visa Category Deactive');
             } else {
                 $category->status = 1;
                 $message = translate('Visa Category Active');
             }
         }
         if ($category->update()) {
             $response = array('output' => 'success', 'statusId' => $category->status, 'dataId' => $category->id, 'message' => $message);
             return response()->json($response);
         }
     }
}
