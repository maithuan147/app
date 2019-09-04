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

Route::group(['namespace' => 'Post\FontEnd', 'prefix' => 'post', 'as' => 'post.'], function () {
    Route::get('/', 'ShowController')->name('show');
    Route::get('/{slug}', 'PostShowController')->name('postshow');
});

Route::group(['namespace' => 'Product\Product\FontEnd', 'prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/', 'ProductController')->name('show');
    Route::get('/category/{category}', 'ProductCategoryController')->name('category');
    Route::get('/{slug}', 'ProductDetailsController')->name('details');
});

