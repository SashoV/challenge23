<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/game/{id}', 'GamesController@show')->name('game')->middleware('checkRole:admin,guest');
Route::get('/player/{id}', 'PlayersController@show')->name('player')->middleware('checkRole:admin,guest');
Route::get('/team/{id}', 'TeamsController@show')->name('team')->middleware('checkRole:admin,guest');

Route::get('/teams', 'TeamsController@index')->name('teams')->middleware('checkRole:admin');
Route::get('/createTeam', 'TeamsController@create')->name('createTeam')->middleware('checkRole:admin');
Route::get('/team/{id}/edit', 'TeamsController@edit')->name('editTeam')->middleware('checkRole:admin');
Route::post('/teams', 'TeamsController@store')->name('storeTeam')->middleware('checkRole:admin');
Route::put('/team/{id}', 'TeamsController@update')->name('updateTeam')->middleware('checkRole:admin');
Route::delete('/team/{id}', 'TeamsController@destroy')->name('deleteTeam')->middleware('checkRole:admin');


Route::get('/players', 'PlayersController@index')->name('players')->middleware('checkRole:admin');
Route::get('/createPlayer', 'PlayersController@create')->name('createPlayer')->middleware('checkRole:admin');
Route::get('/player/{id}/edit', 'PlayersController@edit')->name('editPlayer')->middleware('checkRole:admin');
Route::post('/players', 'PlayersController@store')->name('storePlayer')->middleware('checkRole:admin');
Route::put('/player/{id}', 'PlayersController@update')->name('updatePlayer')->middleware('checkRole:admin');
Route::delete('/player/{id}', 'PlayersController@destroy')->name('deletePlayer')->middleware('checkRole:admin');


Route::get('/games', 'GamesController@index')->name('games')->middleware('checkRole:admin');
Route::get('/createGame', 'GamesController@create')->name('createGame')->middleware('checkRole:admin');
Route::get('/game/{id}/edit', 'GamesController@edit')->name('editGame')->middleware('checkRole:admin');
Route::post('/games', 'GamesController@store')->name('storeGame')->middleware('checkRole:admin');
Route::put('/game/{id}', 'GamesController@update')->name('updateGame')->middleware('checkRole:admin');
Route::delete('/game/{id}', 'GamesController@destroy')->name('deleteGame')->middleware('checkRole:admin');
