<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontendController extends Controller
{
    public function index()
    {
      return view('index')
              ->with('title' , Setting::first()->site_name)
              //show just 4
              ->with('categories' , Category::take(4)->get())
              ->with('first_post' , Post::orderBy('created_at' ,'desc')->first())
              ->with('frontend', Category::find(1))
              ->with('backend', Category::find(2))
              ->with('settingfooter', Setting::first());
    }
}
