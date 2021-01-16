<?php

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

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/login', 'UserController@login');
    Route::post('/create', 'UserController@store');

    Route::group(['middleware' => ['jwt.verify']], function () {

        Route::prefix('users')->group(function () {
            Route::get('/view/{id}', 'UserController@view');
            Route::get('/me', 'UserController@me');
            Route::get('/logout', 'UserController@logout');
            Route::delete('/delete/{id}', 'UserController@delete');
            Route::put('/update/{id}', 'UserController@update');
        });

        Route::prefix('subject')->group(function () {
            Route::get('/list', 'SubjectController@listSubject');
            Route::get('/view/{id}', 'SubjectController@view');
            Route::post('/create', 'SubjectController@store');
            Route::delete('/delete/{id}', 'SubjectController@delete');
            Route::put('/update/{id}', 'SubjectController@update');
        });

        
    });
});
