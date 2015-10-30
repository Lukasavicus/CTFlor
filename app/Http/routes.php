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

// ===================== HOME ====================
Route::get('/', [
    'uses' => '\CTFlor\Http\Controllers\HomeController@index',
    'as' => 'home',
]);

Route::get('about', 'PagesController@about' );

Route::post('/', [
    'uses' => '\CTFlor\Http\Controllers\HomeController@post',
]);

// +++++++++++++++++++++++++++++++++++++++++++++++
