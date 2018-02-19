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

Route::get('/', 'TournamentsController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tournaments', 'TournamentsController@index');
Route::get('/tournaments/{sport}', 'TournamentsController@index');
Route::get('/tournaments/create', 'TournamentsController@create');
Route::post('/tournaments', 'TournamentsController@store');
Route::get('/tournaments/{sport}/{tournament}', 'TournamentsController@show')->name('tournaments.show');
// Route::get('/tournaments/{tournament}', 'TournamentsController@show')->name('tournaments.show');

// Route::post('/tournaments/{tournament}/participate', 'ParticipantsController@store');
Route::get('/tournaments/{sport}/{tournament}/participate', 'TeamsController@create');
Route::get('/vue/users', 'UsersController@index');
Route::post('/tournaments/{sport}/{tournament}', 'TeamsController@store');

Route::get('/tournaments/{sport}/{tournament}/{team}', 'TeamsController@show');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
