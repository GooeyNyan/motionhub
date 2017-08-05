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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/videos/hot', function (Request $request) {

    $hotVideos = DB::table('videos')
    ->select('id', 'name', 'link', 'image')
    ->orderBy('watched', 'desc')
    ->take($request->query('amount'))
    ->get();

    $videos = [
        'hot' => $hotVideos
    ];

    return $videos;
});
