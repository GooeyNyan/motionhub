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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'VideoController@search')->name('search');
Route::get('/vip/search', 'VIPVideoController@search')->name('vip.search');
Route::post('/vip/validate', 'VIPVideoController@keyValidate')->name('vip.validate');
Route::get('/vip/{id}/key', 'VIPVideoController@keyGenerate')->name('vip.key.create');
Route::post('/vip/{id}/key/show', 'VIPVideoController@key')->name('vip.key.show');
Route::get('/#{category}', 'HomeController@index')->name('category');
Route::resource('video', 'VideoController');
Route::resource('vip', 'VIPVideoController');
Route::resource('share', 'ShareController');
