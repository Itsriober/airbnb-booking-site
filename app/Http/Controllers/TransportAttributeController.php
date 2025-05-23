<?php

namespace App\Http\Controllers;

use App\Models\TransportAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TransportAttributeTranslation;
use Mews\Purifier\Facades\Purifier;

class TransportAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lang = $request->lang;
        $page_title = translate('Transports Attributes');
        $attributes = TransportAttribute::latest()->paginate(10);
        return view('backend.transports.attributes.index', compact('page_title', 'attributes', 'lang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** Validation */
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:transport_attributes,name',
            'position' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $attributes = new TransportAttribute;

        $attributes->name = Purifier::clean($request->name);
        $attributes->position = $request->position ?? 0;
        $attributes->save();
        return redirect()->back()->with('success', translate('Attribute saved successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $page_title = translate('Edit Attribute');
        $lang = $request->lang;
        $attributeSingle = TransportAttribute::findOrFail($id);
        return view('backend.transports.attributes.edit', compact('page_title', 'attributeSingle', 'lang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:transport_attributes,name,'.$id,
            'position' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $attributes = TransportAttribute::findOrFail($id);

        if ($request->lang == get_setting("DEFAULT_LANGUAGE", "en")) {
            $attributes->name = Purifier::clean($request->name);
        }

        $attributes->position = $request->position ?? 0;
        if($attributes->update()){
            $attributes_translation = TransportAttributeTranslation::firstOrNew(['lang' => $request->lang, 'attribute_id' => $attributes->id]);
            $attributes_translation->name = Purifier::clean($request->name);
            $attributes_translation->save();
        }

        return redirect()->route('transports.attribute.list')->with('success', translate('Attribute has been updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attributes = TransportAttribute::findOrFail($id);
        $attributes->delete();
        return redirect()->back()->with('success', translate('Attribute deleted successfully'));
    }
}
