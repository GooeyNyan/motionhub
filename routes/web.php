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
Auth::routes();
Route::get('/email/verify/{token}', 'EmailController@verify')->name('email.verify');

// home page
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/#{category}', 'HomeController@index')->name('category');

// video
Route::get('/search', 'VideoController@search')->name('search');

// vip video
Route::get('/vip/search', 'VIPVideoController@search')->name('vip.search');
Route::post('/vip/validate', 'VIPVideoController@keyValidate')->name('vip.validate')->middleware('auth');
Route::get('/vip/{id}/key', 'VIPVideoController@keyGenerate')->name('vip.key.create')->middleware('admin');
Route::post('/vip/{id}/key/show', 'VIPVideoController@key')->name('vip.key.show')->middleware('admin');

// email
Route::get('/subscribe/send', 'SubscriptionController@send')->name('subscribe.send')->middleware('admin');
Route::post('/subscribe/send', 'SubscriptionController@sendEmailToUsers')->name('subscribe.send')->middleware('admin');

// admin
Route::get('/admin', "AdminController@index")->name("admin")->middleware('admin');
Route::post('/admin', "AdminController@store")->name("admin")->middleware('admin');
Route::get('/admin/delete', "AdminController@showDelete")->name("admin.delete")->middleware('admin');
Route::delete('/admin/delete', "AdminController@delete")->name("admin.delete")->middleware('admin');

Route::resource('video', 'VideoController');
Route::resource('vip', 'VIPVideoController');
Route::resource('share', 'ShareController');
Route::resource('subscribe', 'SubscriptionController');

//Route::get("/test", "HomeController@test");