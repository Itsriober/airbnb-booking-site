<?php

namespace App\Http\Controllers;

use App\Models\ActivitiesAttributeTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ActivitiesAttribute;
use App\Models\ActivitiesAttributeTermTranslation;
use Mews\Purifier\Facades\Purifier;

class ActivitiesAttributeTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $attribute_id)
    { 
        $lang = $request->lang;
        $attributeSingle = ActivitiesAttribute::findOrFail($attribute_id);
        $page_title = translate('Attribute').': '.$attributeSingle->getTranslation('name');
        $attribute_terms = ActivitiesAttributeTerm::where('attribute_id',$attribute_id)->latest()->paginate(10);
        return view('backend.activities.attribute_terms.index', compact('page_title', 'attribute_terms', 'lang','attribute_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $attribute_id)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $terms = new ActivitiesAttributeTerm;

        if( $request->hasFile('image')){
            $image = $request->file('image');
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/activities/attribute'), $image_name);
            $terms->image = $image_name;
        }

        $terms->name = Purifier::clean($request->name);
        $terms->icon = $request->icon;
        $terms->attribute_id = $attribute_id;
        $terms->save();
        return redirect()->back()->with('success', translate('Attribute Term saved successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $attribute_id, $id)
    {
        $page_title = translate('Edit Term');
        $lang = $request->lang;
        $termSingle = ActivitiesAttributeTerm::where('id',$id)->where('attribute_id',$attribute_id)->first();
        return view('backend.activities.attribute_terms.edit', compact('page_title', 'termSingle', 'lang','attribute_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $attribute_id, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if( $request->hasFile('image')){
            $validator = Validator::make($request->all(), [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp'
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $terms = ActivitiesAttributeTerm::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $terms->name = Purifier::clean($request->name);
        }

        if( $request->hasFile('image')){
            $image = $request->file('image');
            if (file_exists(public_path('uploads/activities/attribute/' . $terms->image))) {
                unlink(public_path('uploads/activities/attribute/' . $terms->image));
            }
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/activities/attribute'), $image_name);
            $terms->image = $image_name;
        }

        $terms->icon = $request->icon;
        $terms->update();

        $terms_translation = ActivitiesAttributeTermTranslation::firstOrNew(['lang' => $request->lang, 'term_id' => $terms->id]);
        $terms_translation->name = Purifier::clean($request->name);
        $terms_translation->save();

        return redirect()->route('activities.attribute.terms.list',$attribute_id)->with('success', translate('Attribute Term has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($attribute, $id)
    {
        $terms = ActivitiesAttributeTerm::findOrFail($id);
        if (file_exists(public_path('uploads/activities/attribute/' . $terms->image))) {
            unlink(public_path('uploads/activities/attribute/' . $terms->image));
        }
        $terms->delete();
        return redirect()->back()->with('success', translate('Attribute Term deleted successfully'));
    }
}
