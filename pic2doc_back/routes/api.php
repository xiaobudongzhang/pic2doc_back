<?php

use Illuminate\Http\Request;

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

//'auth:api'
Route::post('/user/login', 'Auth\LoginController@loginApi');
Route::get('/user/info', 'Auth\UserController@info');
Route::middleware('auth:api')->post('/user/logout', 'Auth\LoginController@logoutApi');
Route::post('/File/Upload', 'Api\FileController@upload');

Route::middleware('auth:api')->group(function () {

    Route::prefix('Project')->group(function () {
        Route::post('Add', 'Api\ProjectController@create');
        Route::get('List', 'Api\ProjectController@lists');
        Route::post('Update', 'Api\ProjectController@update');
        Route::get('Delete', 'Api\ProjectController@delete');
    });


    Route::prefix('Page')->group(function () {
        Route::post('Add', 'Api\PageController@create');
        Route::get('List', 'Api\PageController@lists');
        Route::post('Update', 'Api\PageController@update');
        Route::get('Delete', 'Api\PageController@delete');
        Route::get('Detail', 'Api\PageController@detail');
    });


    Route::prefix('Point')->group(function () {
        Route::post('Add', 'Api\PointController@create');
        Route::post('List', 'Api\PointController@lists');
        Route::post('Update', 'Api\PointController@update');
        Route::get('Delete', 'Api\PointController@delete');
        Route::get('Detail', 'Api\PointController@detail');
    });

    Route::prefix('PointDetail')->group(function () {

        Route::post('List', 'Api\PointDetailController@lists');
        Route::post('Replace', 'Api\PointDetailController@replace');
        Route::get('Detail', 'Api\PointDetailController@detail');
    });

});