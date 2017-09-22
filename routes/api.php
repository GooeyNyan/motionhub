<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/videos/hot', 'VideoController@getHottestVideos')->middleware('api');
Route::get('/videos/new', 'VideoController@getNewestVideos')->middleware('api');
Route::get('/videos', 'VideoController@getVideos')->middleware('api');
Route::patch('/video/watch', 'VideoController@updateWatched')->middleware('api');
Route::get('/video', 'VideoController@searchVideo')->middleware('api');