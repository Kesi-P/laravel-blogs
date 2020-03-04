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
});
