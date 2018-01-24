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

Route::get('/', 'TournamentsController@index');

Route::get('/tournaments', 'TournamentsController@index');
Route::get('/tournaments/create', 'TournamentsController@create');
Route::post('/tournaments', 'TournamentsController@store');
Route::get('/tournaments/{tournament}', 'TournamentsController@show')->name('tournaments.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
