<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//group of admin
Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){

  Route::get('/home',[
    'uses' => 'HomeController@index',
    'as' => 'home'
  ]);

  Route::get('/post/create',[
    'uses' => 'Postscontroller@create',
    'as' => 'post.create'
  ]);
  Route::post('/post/store', [
    'uses' => 'Postscontroller@store',
    'as' => 'post.store'
  ]);

  Route::get('/category/create',[
    'uses' => 'Categoriescontroller@create',
    'as' => 'category.create'
  ]);

  Route::post('/category/store',[
    'uses' =>'Categoriescontroller@store',
    'as'=> 'category.store'
  ]);

  Route::post('/category/update/{id}',[
    'uses' =>'Categoriescontroller@update',
    'as'=> 'category.update'
  ]);

  Route::get('/categories',[
    'uses' =>'Categoriescontroller@index',
    'as'=> 'categories'
  ]);

  Route::get('/category/edit/{id}',[
    'uses' =>'Categoriescontroller@edit',
    'as'=> 'category.edit'
  ]);

  Route::get('/category/delete/{id}',[
    'uses' =>'Categoriescontroller@destroy',
    'as'=> 'category.delete'
  ]);

  Route::get('/posts',[
    'uses' =>'Postscontroller@index',
    'as'=> 'posts'
  ]);

  Route::get('/post/edit/{id}',[
    'uses' =>'Postscontroller@edit',
    'as'=> 'post.edit'
  ]);

  Route::get('/post/delete/{id}',[
    'uses' =>'Postscontroller@destroy',
    'as'=> 'post.delete'
  ]);

  Route::get('/post/trashed',[
    'uses' =>'Postscontroller@trash',
    'as'=> 'post.trashed'
  ]);

  Route::get('/post/restore/{id}',[
    'uses' =>'Postscontroller@restore',
    'as'=> 'post.restore'
  ]);

  Route::get('/post/kill/{id}',[
    'uses' =>'Postscontroller@delete',
    'as'=> 'post.kill'
  ]);

  Route::post('/post/update/{id}',[
    'uses' =>'Postscontroller@update',
    'as'=> 'post.update'
  ]);


  Route::get('/tags',[
    'uses' => 'TagsController@index',
    'as'=> 'tags'
  ]);

  Route::get('/tag/edit/{id}',[
    'uses' => 'TagsController@edit',
    'as'=> 'tag.edit'
  ]);

  Route::post('/tag/update/{id}',[
    'uses' => 'TagsController@update',
    'as'=> 'tag.update'
  ]);

  Route::get('/tag/delete/{id}',[
    'uses' => 'TagsController@destroy',
    'as'=> 'tag.delete'
  ]);

  Route::get('/tag/create',[
    'uses' => 'TagsController@create',
    'as' => 'tag.create'
  ]);

  Route::post('/tag/store', [
    'uses' => 'TagsController@store',
    'as' => 'tag.store'
  ]);


  Route::get('/test', function(){
    //return App\Category::all();
    return App\User::find(1)->profile;
    //return App\Category::find(2)->post;
    //or
    //return App\Post::find(2)->category;
  });

  // user
  Route::get('/users',[
    'uses' => 'UsersController@index',
    'as' => 'users'
  ]);

  Route::get('/user/create',[
    'uses' => 'UsersController@create',
    'as' => 'user.create'
  ]);

  Route::post('/user/store', [
    'uses' => 'UsersController@store',
    'as' => 'user.store'
  ]);

  Route::get('/user/admin/{id}',[
    'uses' => 'UsersController@be_admin',
    'as' => 'user.admin'
  ]);

  Route::get('/user/sub/{id}',[
    'uses' => 'UsersController@not_admin',
    'as' => 'user.sub'
  ]);

  Route::get('user/profile', [
    'uses' => 'ProfilesController@index',
    'as'=> 'user.profile'
  ]);
 //don't need to pass id , user already Authorize
  Route::post('user/profile', [
    'uses' => 'ProfilesController@update',
    'as'=> 'user.profile.update'
  ]);
});
