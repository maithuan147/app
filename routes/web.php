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
    return view('auth.login');
});
Route::resource('post', 'PostController');
Route::resource('tag', 'TagController');
Route::resource('categories', 'CategoryController');
Route::resource('role', 'RoleController');
// Route::resource('post', 'PostController');
// Route::group(['middleware'=>'auth'],function () {
    
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
