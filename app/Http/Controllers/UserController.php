<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userType = config('constants.user_type');
        if (Auth()->user()->user_type !='SUPER'){
            $users    = User::where('user_type' , '<>' , 'SUPER')->paginate(10);
        }
        else{
            $userType = array_merge($userType , config('constants.user_type_super'));
            $users    = User::paginate(10);
        }

        return view('users.index' , compact('users' , 'userType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userType = config('constants.user_type');
        return view('users.create' , compact( 'userType'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $request->authorize();

        User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => bcrypt($request->password) ,
            'user_type' => $request->user_type ,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user->user_type == 'SUPER' && Auth()->user()->user_type != 'SUPER'){
            abort(404);
        }
        dd($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id , 'delete');
    }
}
