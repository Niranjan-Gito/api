<?php

//Auth
Route::group(['namespace' => 'Auth','middleware' => ['Client']], function () {
    // Controllers Within The "App\Http\Controllers\V1\Auth" Namespace
    //TODO: need to implement
    //Auth
//        Route::post('/register','AuthController@register');
//        Route::get('/password/change','AuthController@changePassword');
//        Route::post('/password/email','AuthController@sendResetLinkEmail');
//        Route::get('/password/reset','AuthController@reset');
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