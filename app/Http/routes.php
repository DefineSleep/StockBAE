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
/*Route::get('/', 'HomeController@index');
Route::get('/', 'WelcomeController@index');*/
Route::get('/', 'ClientController@index');
Route::get('client', 'ClientController@index');
Route::get('client/add', 'ClientController@add');
Route::get('client/edit', 'ClientController@edit');
Route::get('client/delete', 'ClientController@delete');

Route::get('fa', 'FaController@index');
Route::get('fa/add', 'FaController@add');
Route::get('fa/edit', 'FaController@edit');
Route::get('fa/delete', 'FaController@delete');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
