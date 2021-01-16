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
Route::group([
    'middleware' => 'api'
], function ($router) {
    Route::prefix('users')->group(function () {
        Route::get('/view/{id}', 'UserController@view');
        Route::get('/me', 'UserController@me');
        
        Route::get('/logout', 'UserController@logout');
        Route::post('/create', 'UserController@store');
        Route::delete('/delete/{id}', 'UserController@delete');
        Route::put('/update/{id}', 'UserController@update');
    });
});
