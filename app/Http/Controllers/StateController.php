<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateFormRequest;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::latest()->paginate(10);
        return view('states.index' , compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateFormRequest $request)
    {
         $request->authorize();

        State::create([
            'name_ar' => $request->name_ar ,
            'name_en' => $request->name_en ,
        ]);

        return redirect()->route('states.index')->with(
            'message'  , 'Added New State Successfully'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
       return view('states.edit' ,compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(StateFormRequest $request, State $state)
    {
        $request->authorize();
        $state->name_ar = $request->name_ar;
        $state->name_en = $request->name_en;
        $state->save();
        return redirect()->route('states.index')->with(
            'message'  , 'Update State Successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
        $state->delete();
        return redirect()->route('states.index')->with(
            'message'  , 'Delete State Successfully'
        );
    }
}
