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
/*Route::get('/', 'HomeController@index');*/
Route::get('/cview', 'ClientController@index');
Route::get('/cedit', 'ClientController@edit');
Route::get('/cdelete', 'ClientController@delete');
Route::get('/cadd', 'ClientController@add');
Route::get('/', 'ClientController@index');
Route::get('/fview', 'FaController@index');
Route::get('/fedit', 'FaController@edit');
Route::get('/fdelete', 'FaController@delete');
Route::get('/fadd', 'FaController@add');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
