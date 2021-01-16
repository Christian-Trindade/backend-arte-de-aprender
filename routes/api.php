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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', 'UserController@login');
Route::post('/create-user', 'UserController@store');
Route::group(['middleware' => 'jwt'], function () {
    Route::prefix('users')->group(function () {
        Route::post('/create', 'UserController@store');
        Route::delete('/delete/{id}', 'UserController@delete');
        Route::put('/update/{id}', 'UserController@update');
    });
});
