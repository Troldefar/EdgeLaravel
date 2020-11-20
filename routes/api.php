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

Route::get('ping', 'App\Http\Controllers\IndexController@index');

Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {

    /**
     * Administrator stuff goes here
     */

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('allUsers', 'App\Http\Controllers\Api\Admin\UserController@index');
    });

    /** 
     * User
    */
    Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout');

    /**
     * Statistics
    */
    Route::get('statistics/{id}', 'App\Http\Controllers\Api\StatisticsController@userStatistics');

    /**
     * Friends
    */
    Route::get('friends/{id}', 'App\Http\Controllers\Api\FriendsController@userFriends');
    Route::get('users', 'App\Http\Controllers\Api\UserController@index');

    /**
     * Logs
    */
    Route::get('logs', 'App\Http\Controllers\Api\LogsController@index');

    /**
     * User settings
    */
    Route::get('settings/{id}', 'App\Http\Controllers\Api\SettingsController@settings');

    /**
     * Teams
    */
    Route::get('teams/{id}', 'App\Http\Controllers\Api\TeamsController@teams');

    /**
     * Bagdes
    */
    Route::get('bagdes', 'App\Http\Controllers\Api\BagdesController@index');
    Route::get('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@show');
    Route::post('bagdes', 'App\Http\Controllers\Api\BagdesController@store');
    Route::put('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@update');
    Route::delete('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@delete');
});