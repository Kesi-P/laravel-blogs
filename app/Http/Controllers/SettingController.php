<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
      return view('admin.settings.settings')->with('settings' , Setting::first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
      $this->validate(request(),[
        'site_name' => 'required',
        'contact_email'=> 'required',
        'contact_number' => 'required',
        'address' => 'required'
      ]);
      $settings = Setting::first();

      $settings->site_name = request()->site_name;
      $settings->address = request()->address;
      $settings->contact_email = request()->contact_email;
      $settings->contact_number = request()->contact_number;

      $settings->save();
      Session::flash('success' ,'Settings Updated');

      return redirect()->back();

    }
}
