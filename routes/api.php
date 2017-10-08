<?php

use App\User;
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

Route::middleware('api')->get('/user', function (Request $request) {
    return User::where('id', $request->get('id'))
        ->select('id', 'name', 'avatar')
        ->first();
});


Route::get('/videos/hot', 'APIController@getHottestVideos')->middleware('api');
Route::get('/videos/new', 'APIController@getNewestVideos')->middleware('api');
Route::get('/videos/category', 'APIController@getVideosOfACategory')->middleware('api');
Route::get('/videos', 'APIController@getVideos')->middleware('api');
Route::patch('/video/watch', 'APIController@updateWatched')->middleware('api');
Route::get('/video/name', 'APIController@searchVideoByName')->middleware('api');
Route::get('/video/tag', 'APIController@searchVideoByTag')->middleware('api');

Route::get('/vipVideos', 'APIController@getVIPVideos')->middleware('api');
Route::get('/vip/name', 'APIController@searchVIPVideoByName')->middleware('api');
Route::get('/vip/tag', 'APIController@searchVIPVideoByTag')->middleware('api');

Route::get('/users', 'APIController@getUsers')->middleware('api');
Route::get('/tags', 'APIController@getTags')->middleware('api');
Route::get('/share', 'APIController@getShares')->middleware('api');
