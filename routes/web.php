<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/add-project', 'ProjectController@add')->name('project-add');
Route::post('/do-add-project', 'ProjectController@create')->name('do-add-project');
Route::get('/edit-project/{id}', 'ProjectController@edit')->name('project-edit');
Route::post('/do-edit-project/{id}', 'ProjectController@update')->name('do-edit-project');
Route::get('/delete-project/{id}', 'ProjectController@delete')->name('project-delete');


Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::get('/add-task', 'TaskController@add')->name('add-task');
Route::post('/do-add-task', 'TaskController@create')->name('do-add-task');
Route::get('/edit-task/{id}', 'TaskController@edit')->name('edit-task');
Route::post('/do-edit-task/{id}', 'TaskController@update')->name('do-edit-task');
Route::get('/delete-task/{id}', 'TaskController@delete')->name('delete-task');
