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


Route::prefix('v1/todos')->namespace('V1')->group(function () {


    Route::get('/', 'TodoController@index');

    Route::post('/store', 'TodoController@store');

    Route::post('/update', 'TodoController@update');

    Route::post('/mark-complete', 'TodoController@markCompleted');

    Route::post('/delete', 'TodoController@delete');
});
