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

Route::get('/', 'App\Http\Controllers\IndexController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bagdes', 'App\Http\Controllers\Api\BagdesController@index');

Route::get('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@show');

Route::post('bagdes', 'App\Http\Controllers\Api\BagdesController@store');

Route::put('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@update');

Route::delete('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@delete');