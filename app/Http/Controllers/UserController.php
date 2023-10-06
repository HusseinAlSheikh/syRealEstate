<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userType = $this->getUserTypes();
        if (Auth()->user()->user_type !='SUPER'){
            $users    = User::where('user_type' , '<>' , 'SUPER')->paginate(10);
        }
        else{
            $users    = User::paginate(10);
        }
        if ($request->ajax()){
            return DataTables::of($users)->addIndexColumn()->rawColumns(['action'])->make(true);
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
        $userType = $this->getUserTypes();
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

        return redirect()->route('users.index')->with(
                'message'  , 'Added New User Successfully'
            );
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
        $userType = $this->getUserTypes();
        return view('users.edit' , compact('user' , 'userType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $request->authorize();
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->user_type = $request->user_type;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index')->with(
            'message' , 'Updated User Successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with(
            'message' , 'Deleted User Successfully'
        );
    }


    //-------
    private function getUserTypes(){
        $userType = config('constants.user_type');
        if (Auth()->user()->user_type =='SUPER'){
            $userType = array_merge($userType , config('constants.user_type_super'));
        }
        return $userType;
    }
}
