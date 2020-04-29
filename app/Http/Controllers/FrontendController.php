<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

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
              ->with('settingfooter', Setting::first())
              ->with('tags' , Tag::all());
    }

    public function singlePost($slug)
    {
      $post = Post::where('slug', $slug)->first();
      $next_id = Post::where('id','>',$post->id)->min('id');
      $prev_id = Post::where('id','<',$post->id)->max('id');
      return view('includes.single')->with('post',$post)
                                    ->with('title' , Setting::first()->site_name)
                                    ->with('categories',Category::take(5)->get())
                                    ->with('settingfooter', Setting::first())
                                    ->with('next', Post::find($next_id))
                                    ->with('prev', Post::find($prev_id))
                                    ->with('tags' , Tag::all());
    }

    public function category($id)
    {
      $category = Category::find($id);

      return view('category')->with('category', $category)
                                      ->with('title' , Setting::first()->site_name)
                                      ->with('settingfooter' , Setting::first())
                                      ->with('categories',Category::take(5)->get())
                                      ->with('tags' , Tag::all());
    }

    public function tag($id)
    {
      $tags = Tag::find($id);
      //dd($id);
      return view('tag')->with('tag', $tags)
                        ->with('title' , Setting::first()->site_name)
                        ->with('settingfooter' , Setting::first())
                        ->with('categories',Category::all());
    }
}
