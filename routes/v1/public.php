<?php

//Auth
Route::group(['namespace' => 'Auth','middleware' => ['Client']], function () {
    // Controllers Within The "App\Http\Controllers\V1\Auth" Namespace
    //TODO: need to implement email register activation link ?
    //Auth
        Route::post('/register','AuthController@register');
//        Route::get('/password/change','AuthController@changePassword');
//        Route::post('/password/email','AuthController@sendResetLinkEmail');
//        Route::get('/password/reset','AuthController@reset');

    Route::post('/subscribe','AuthController@subscribe');
});

//Page
Route::group(['namespace' => 'Page','middleware' => ['Client']], function () {
    // Controllers Within The "App\Http\Controllers\V1\User" Namespace

    //Pages
    Route::get('/pages','PageController@index');
    Route::get('/pages/{slug}','PageController@getPage');
});

//Vendors
Route::group(['namespace' => 'Vendor','middleware' => ['Client']], function () {
    // Controllers Within The "App\Http\Controllers\V1\Vendors" Namespace

    //vendors
    Route::get('/vendors','VendorsController@index');
    Route::get('/vendors/{slug}','VendorsController@show');
});

//Home
Route::group(['namespace' => 'Home','middleware' => ['Client']], function () {
    // Controllers Within The "App\Http\Controllers\V1\Home" Namespace

    Route::get('/home/{option}','HomeController@show');
});