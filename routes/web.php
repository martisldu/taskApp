<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', [
    'uses' => 'TaskController@getAll',
    'as' => 'home'
]);


Route::post('/create-task', [
    'uses' => 'TaskController@createTask',
    'as' => 'create-task']);

Route::post('edit-task', [
    'uses' => 'TaskController@editTask',
    'as' => 'edit-task'
]);

Route::post('delete-task', [
    'uses' => 'TaskController@deleteTask',
    'as' => 'delete-task'
]);