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

        Route::prefix('topic')->group(function () {
            Route::get('/list/{id}', 'TopicController@listTopic');
            Route::get('/view/{id}', 'TopicController@view');
        });

        Route::prefix('beat')->group(function () {
            Route::get('/list-all', 'BeatController@listAllBeat');
            Route::get('/list-category/{id}', 'BeatController@listByCategory');
            Route::get('/view/{id}', 'BeatController@view');
        });

        Route::prefix('beat-category')->group(function () {
            Route::get('/list-all', 'BeatCategoryController@listBeatCategory');
            Route::get('/list-status/{id}', 'BeatCategoryController@getByStatus');
            Route::get('/view/{id}', 'BeatCategoryController@view');
        });

        Route::prefix('audio')->group(function () {
            Route::get('/list-topic/{id}', 'AudioController@listByTopic');
            Route::get('/list-user/{id}', 'AudioController@listByUser');
            Route::get('/list-beat/{id}', 'AudioController@listByBeat');
            Route::get('/view/{id}', 'AudioController@view');
            Route::delete('/delete/{id}', 'AudioController@delete');
            Route::post('/create', 'AudioController@store');
            Route::put('/update/{id}', 'AudioController@update');
            
        });

    });
});
