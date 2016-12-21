<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'V1'], function () {
    // Controllers Within The "App\Http\Controllers\V1" Namespace

    require_once('v1/public.php');
    require_once('v1/private.php');

});