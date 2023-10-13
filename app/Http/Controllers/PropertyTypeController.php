<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyTypeFormRequest;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propertyTypes = PropertyType::latest()->paginate(10);
        return view('propertyTypes.index' , compact('propertyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propertyTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyTypeFormRequest $request)
    {
        $request->authorize();

        $propertyType = new PropertyType;
        $propertyType->name_ar = $request->name_ar;
        $propertyType->name_en = $request->name_en;
        $propertyType->save();

        return redirect()->route('propertyTypes.index')->with(
            'message'  , 'Added New Property Type Successfully'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyType $propertyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyType $propertyType)
    {
        return view('propertyTypes.edit' , compact('propertyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyTypeFormRequest $request, PropertyType $propertyType)
    {
        $request->authorize();
        $propertyType->name_ar = $request->name_ar;
        $propertyType->name_en = $request->name_en;
        $propertyType->save();

        return redirect()->route('propertyTypes.index')->with(
            'message'  , 'Update Property Type Successfully'
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyType $propertyType)
    {
        //
        $propertyType->delete();
        return redirect()->route('propertyTypes.index')->with(
            'message'  , 'Delete Property Type Successfully'
        );
    }
}
