<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('api.token')->group(function () {
    Route::get('users', 'Api\UserController@index');
    Route::post('users', 'Api\UserController@store');
    Route::get('users/{user}', 'Api\UserController@show');
    Route::put('users/{user}', 'Api\UserController@update');
    Route::delete('users/{user}', 'Api\UserController@destroy');
});
