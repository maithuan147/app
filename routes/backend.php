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
Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);

Route::get('language/{language}', 'LangController')->name('language');



Route::resource('tag', 'TagController');
Route::resource('user', 'UserController');

Route::group(['namespace' => 'Post', 'prefix' => 'post', 'as' => 'post.'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('listTrash', 'IndexTrashController')->name('listTrash');
    Route::get('seach', 'SeachController')->name('seach');
    Route::get('create', 'CreateController')->name('create');
    Route::post('store', 'StoreController')->name('store');
    Route::get('edit/{id}', 'EditController')->name('edit');
    Route::put('update/{id}', 'UpdateController')->name('update');
    Route::post('restore/{id}', 'RestoreController')->name('restore');
    Route::put('clone/{id}', 'CloneController')->name('clone');
    Route::delete('delete/{id}', 'DeleteController')->name('delete');
    Route::delete('trash/{id}', 'TrashController')->name('trash');
    Route::delete('bulk', 'BulkController')->name('bulk');
    Route::get('export', 'ExportController')->name('export');
});

Route::group(['namespace' => 'Category', 'prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('create', 'CreateController')->name('create');
    Route::post('store', 'StoreController')->name('store');
    Route::get('edit/{id}', 'EditController')->name('edit');
    Route::put('update/{id}', 'UpdateController')->name('update');
    Route::delete('bulk', 'BulkController')->name('bulk');
    Route::delete('delete/{id}', 'DeleteController')->name('delete');
});

Route::group(['namespace' => 'Tag', 'prefix' => 'tag', 'as' => 'tag.'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('create', 'CreateController')->name('create');
    Route::post('store', 'StoreController')->name('store');
    Route::get('edit/{id}', 'EditController')->name('edit');
    Route::put('update/{id}', 'UpdateController')->name('update');
    Route::delete('bulk', 'BulkController')->name('bulk');
    Route::delete('delete/{id}', 'DeleteController')->name('delete');
});

Route::group(['namespace' => 'Role', 'prefix' => 'role', 'as' => 'role.'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('seach', 'SeachController')->name('seach');
    Route::get('create', 'CreateController')->name('create');
    Route::post('store', 'StoreController')->name('store');
    Route::get('edit/{id}', 'EditController')->name('edit');
    Route::put('update/{id}', 'UpdateController')->name('update');
    Route::put('clone/{id}', 'CloneController')->name('clone');
    Route::delete('delete/{id}', 'DeleteController')->name('delete');
    Route::delete('bulk', 'BulkController')->name('bulk');
});
Route::group(['namespace' => 'Setting'], function () {
    Route::group(['namespace' => 'Restricted','prefix' => 'options-restricted', 'as' => 'options-restricted.'], function () {
        Route::get('/', 'IndexController')->name('restricted');
        Route::post('/restricted-words', 'RestrictedController')->name('restricted-words');
    });
    Route::group(['namespace' => 'Media','prefix' => 'options-media', 'as' => 'options-media.'], function () {
        Route::get('/', 'IndexController')->name('media');
        Route::put('/media', 'SizeController')->name('media');
    });
});


// Auth::routes();

// Route::get('/', 'HomeController@index');

