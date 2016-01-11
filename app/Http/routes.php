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
/*
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/shout', 'HomeController@shout');
*/
Route::get('/initialize', 'DataController@setData');
Route::get('/clean', 'DataController@removeData');

Route::get('/task', 'TaskController@getTask');
Route::post('/task', 'TaskController@postTask');

Route::resource('profile','ProfileController');

Route::controllers([
	'account' => 'Auth\AuthController',
	'profile' => 'ProfileController',
	'admin' => 'AdminController',
	'/' => 'HomeController'
]);
