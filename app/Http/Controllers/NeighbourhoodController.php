<?php

namespace App\Http\Controllers;

use App\Http\Requests\NeighbourhoodFormRequest;
use App\Models\City;
use App\Models\Neighbourhood;
use Illuminate\Http\Request;

class NeighbourhoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $cities = City::all();
        $neighbourhoods = Neighbourhood::latest()->with('city')->paginate(10);
        return view('neighbourhoods.index' , compact( 'neighbourhoods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('neighbourhoods.create' , compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NeighbourhoodFormRequest $request)
    {
        $request->authorize();
        Neighbourhood::create([
            'name_ar' => $request->name_ar ,
            'name_en' => $request->name_en,
            'city_id' => $request->city_id ,
        ]);

        return redirect()->route('neighbourhoods.index')->with(
            'message'  , 'Added New Neighbourhood Successfully'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Neighbourhood  $neighbourhood
     * @return \Illuminate\Http\Response
     */
    public function show(Neighbourhood $neighbourhood)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Neighbourhood  $neighbourhood
     * @return \Illuminate\Http\Response
     */
    public function edit(Neighbourhood $neighbourhood)
    {
        $cities = City::all();
        return view('neighbourhoods.edit' , compact('cities' , 'neighbourhood'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Neighbourhood  $neighbourhood
     * @return \Illuminate\Http\Response
     */
    public function update(NeighbourhoodFormRequest $request, Neighbourhood $neighbourhood)
    {
        $request->authorize();
        $neighbourhood->name_ar = $request->name_ar;
        $neighbourhood->name_en = $request->name_en;
        $neighbourhood->city_id = $request->city_id;
        $neighbourhood->save();
        return redirect()->route('neighbourhoods.index')->with(
            'message'  , 'Update Neighbourhood Successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Neighbourhood  $neighbourhood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Neighbourhood $neighbourhood)
    {
        //
        $neighbourhood->delete();
        return redirect()->route('neighbourhoods.index')->with(
            'message'  , 'Delete Neighbourhood Successfully'
        );
    }
}
