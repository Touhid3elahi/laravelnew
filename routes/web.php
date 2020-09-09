<?php

use Illuminate\Support\Facades\Route;

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

//route
//Route::get('/', function () {
//    return view('welcome');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
route::view('/contact','contact');
//route::view('/','pages.index');
Route::get('about/us','pagecontroller@about')->name('about');
Route::get('/','pagecontroller@index');



//category
Route::get('add/category','categorycontroller@addcategory')->name('add.category');
Route::get('all/category','categorycontroller@allcategory')->name('all.category');
Route::post('store/category','categorycontroller@storecategory')->name('store.category');
Route::get('view/category/{id}','categorycontroller@viewcategory');
Route::get('delete/category/{id}','categorycontroller@deletecategory');
Route::get('edit/category/{id}','categorycontroller@editcategory');
Route::post('update/category/{id}','categorycontroller@updatecategory');
// post crude
Route::get('write/post','postcontroller@writepost')->name('write.post');
Route::post('store/post','postcontroller@storepost')->name('store.post');
Route::get('all/post','postcontroller@allpost')->name('all.post');
Route::get('view/post/{id}','postcontroller@viewpost');
Route::get('edit/post/{id}','postcontroller@editpost');
Route::post('update/post/{id}','postcontroller@updatepost');
Route::post('delete/post/{id}','postcontroller@deletepost');