<?php

namespace App\Http\Controllers;

use App\Models\AnnounceType;
use App\Models\Bokerage;
use App\Models\Neighbourhood;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->isAdmin()){
            $properties = Property::latest()->with('neighbourhood')->with('propertyType')->with('user')->paginate(10);
            return view('properties.admin.index' , compact('properties'));
        }else{
            dd('not admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($this->isAdmin()){
            $propertyType  = PropertyType::latest()->get();
            $bokerage      = Bokerage::latest()->get();
            $neighbourhood = Neighbourhood::latest()->get();
            $announceType  = AnnounceType::latest()->get();
            $propertyNum = Property::all()->count() + 1 ;
            $propertyNum = str_pad($propertyNum,'6','0' ,STR_PAD_LEFT);
            return view('properties.admin.create' , compact('propertyNum','propertyType' ,'neighbourhood' ,'bokerage' , 'announceType'));
        }else{
            dd('not admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }


    private function isAdmin(){
        return in_array(Auth::user()->user_type,['ADMIN' , 'SUPER']);
    }
}
