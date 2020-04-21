<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Profile;
class UsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('admin'); //subscriber can do nothing which belongs to these function
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user = User::all();
        return view('admin.users.index')->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'email' =>'required|email'
      ]);

      $user = User::create([
        'name' =>$request->name,
        'email' =>$request->email,
        'password' =>bcrypt('12345678')
      ]);

      $profile = Profile::create([
        'user_id'=> $user->id
      ]);


      return redirect()->back();
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
        //
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
        //
    }

    public function be_admin($id)
    {
      $user = User::find($id);

      $user->admin =1;
      $user->save();

      Session::flash('success', 'Change to be an Admin');
      return redirect()->back();
    }

    public function not_admin($id)
    {
      $user = User::find($id);

      $user->admin =0;
      $user->save();

      Session::flash('success', 'Change to be a Subscribe');
      return redirect()->back();
    }
}
