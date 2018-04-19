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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user', 'APIController@user');

Route::get('/tournaments', 'APIController@tournaments'); //->middleware('auth:api');
Route::get('/tournaments/{id}', 'APIController@tournament'); //->middleware('auth:api');
Route::post('/tournaments/{id}', 'APIController@results'); //->middleware('auth:api');
