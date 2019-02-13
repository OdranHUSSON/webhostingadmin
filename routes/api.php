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
Route::get('tasks', 'tasksController@fetch');
Route::post('tasks', 'tasksController@persist');
Route::delete('tasks', 'tasksController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
