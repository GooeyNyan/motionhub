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
Route::resource('video', 'VideoController');
Route::get('/vip', 'VideoController@vip')->name('vip');
Route::get('/vip/{id}', 'VideoController@vipShow')->name('vip.show');

Route::get('/video', 'VideoController@searchVideo')->name('video.search');