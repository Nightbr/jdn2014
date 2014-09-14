<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/* Groupe de routes pour le versioning d'API */
Route::group(array('prefix' => 'v1', 'before' => 'auth.basic'), function()
{
  Route::resource('categorie', 'CategorieController', array('except' => array('create', 'edit', 'destroy')));
  Route::get("categorie/{id}/guest", array("uses" => "CategorieController@showGuest"));
  Route::resource('guest', 'GuestController', array('except' => array('create', 'edit', 'destroy')));
});

/* groupe de routes pour le système d'auth */
Route::group(array('prefix' => 'user'), function()
{
    Route::get('login', function(){
        return View::make('user.login');
    });
    Route::post('login', array('before' => 'csrf', 'uses' => 'UserController@login'));
    Route::get("logout", array("uses" => "UserController@logout"));
});