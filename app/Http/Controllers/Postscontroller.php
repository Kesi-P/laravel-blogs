<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Auth;
use Illuminate\Support\Str;
class Postscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count() == 0 || $tags->count() == 0)
        {
          Session::flash('info','Need to create a Category and Tag first');
          return redirect()->back();
        }
        return view('admin.posts.create')->with('categories', Category::all())->with('tags',Tag::all()) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
          'title' => 'required|max:255',
          'featured'=>'required|image',
          'content' => 'required',
          'category_id' => 'required',
          'tags' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
          'title' =>$request->title,
          'content' =>$request->content,
          'featured' => 'uploads/posts/' . $featured_new_name,
          'category_id' =>$request->category_id,
          'slug' => Str::slug($request->title),
          'user_id' => Auth::id()
        ]);
      //post with tag relation attach request tags array
        $post->tags()->attach($request->tags);
        Session::flash('success', 'Created new Post');
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
        $posts = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit')->with('posts', $posts)->with('categories', $categories)->with('tags', Tag::all());
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
        $this->validate($request,[
          'title' =>'required',
          'content' => 'required',
          'category_id' => 'required'
        ]);

        $post = Post::find($id);
        if($request->hasFile('featured'))
        {

          $featured = $request->featured;
          $featured_new_name = time().$featured->getClientOriginalName();
          $featured->move('uploads/posts',$featured_new_name);

          $post->featured = 'uploads/posts/' . $featured_new_name;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags); //update tag
        Session::flash('success', 'Post is updated');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success','The post was just trashed');
        return redirect()->back();
    }

    public function trash()
    {
      $post = Post::onlyTrashed()->get();
      return view('admin.posts.trash')->with('trashes' , $post);
      //dd($post);
    }

    public function restore($id)
    {
      $trash = Post::withTrashed()->where('id',$id)->get()->first();
      $trash->restore();
      return redirect()->back();
    }

    public function delete($id)
    {
      $kill = Post::withTrashed()->where('id',$id)->first();
      $kill->forceDelete();
      return redirect()->back();
    }
}
