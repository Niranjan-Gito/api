<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;

Route::get('/', function () {
    // Login and "remember" the given user...
//    Auth::loginUsingId(1, true);
//    Auth::logout();
    return view('welcome');
});

Route::post('/register-site','Passport\PassportClientsController@store');