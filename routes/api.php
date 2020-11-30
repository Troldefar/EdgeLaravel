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

/** 
 * Ping
 * Pong?
 */
Route::get('ping', 'App\Http\Controllers\IndexController@index');

/** 
 * AUTH
 * Laravel scaffolding is used
 */
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function () {

    /** 
     * ROLES
     * FOR TESTING PURPOSES
     */

    Route::get('roles', 'App\Http\Controllers\Api\PermissionController@Permission');

    /** SESSION KEEPER
     * Guarded user
     */
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    /**
     * Role middleware for admins
     * 
     */
    Route::group(['middleware' => 'role:admin'], function () {
        /** 
         * /GET info
         */
        Route::get('users/admin', 'App\Http\Controllers\Api\Admin\UserController@index');
        Route::get('logs/admin', 'App\Http\Controllers\Api\Admin\LogsController@index');
        Route::get('statistics/admin', 'App\Http\Controllers\Api\Admin\StatisticsController@index');
        Route::get('payments/admin', 'App\Http\Controllers\Admin\PaymentController@index');
        Route::get('bagdes/admin', 'App\Http\Controllers\Admin\BagdesController@index');
        Route::get('team/admin', 'App\Http\Controllers\Admin\TeamController@index');
        Route::get('games/admin', 'App\Http\Controllers\Admin\GameController@index');
    });

    /** 
     * Game controller
     */
    Route::get('games', 'App\Http\Controllers\Api\GameController@index');
    Route::post('games', 'App\Http\Controllers\Api\GameController@store');

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
    Route::get('invites', 'App\Http\Controllers\Api\InviteController@invites');
    Route::post('invite', 'App\Http\Controllers\Api\InviteController@store');

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
    Route::get('teams', 'App\Http\Controllers\Api\TeamController@index');
    Route::get('teams/{id}', 'App\Http\Controllers\Api\TeamController@show');
    Route::post('teams', 'App\Http\Controllers\Api\TeamController@store');

    /**
     * Bagdes
    */
    Route::get('bagdes', 'App\Http\Controllers\Api\BagdesController@index');
    Route::get('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@show');
    Route::post('bagdes', 'App\Http\Controllers\Api\BagdesController@store');
    Route::put('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@update');
    Route::delete('bagdes/{id}', 'App\Http\Controllers\Api\BagdesController@delete');
});