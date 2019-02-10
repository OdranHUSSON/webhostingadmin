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
Route::get('tasks', 'tasksController@retrieveTasks')->name('Retrieve tasks');
Route::post('tasks', 'tasksController@createTasks')->name('Create a new task');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
