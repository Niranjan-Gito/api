<?php
//User
Route::group(['namespace' => 'User','middleware' => 'auth:api'], function () {
    // Controllers Within The "App\Http\Controllers\V1\User" Namespace

    //Users
    Route::get('/user','UserController@index');
    Route::post('/user','UserController@update');
});

//Address
Route::group(['namespace' => 'Address','middleware' => 'auth:api'], function () {
    // Controllers Within The "App\Http\Controllers\V1\Address" Namespace

    //Address
    Route::post('/address','AddressController@store');
    Route::get('/address/{id}','AddressController@show');
    Route::get('/address','AddressController@index');

});