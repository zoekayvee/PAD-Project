<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/profile', 'ProfileController@showCommittee');
Route::get('/profile/head', 'ProfileController@showHeads');
Route::get('/profile/oah', 'ProfileController@showOAH');

Route::controllers([
	'account' => 'Auth\AuthController'
]);
