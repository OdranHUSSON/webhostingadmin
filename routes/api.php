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
Route::get('tasks', 'tasksApiController@fetch')->name('task.get');
Route::post('tasks', 'tasksApiController@persist')->name('task.post');
Route::delete('tasks', 'tasksApiController@delete')->name('task.delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
