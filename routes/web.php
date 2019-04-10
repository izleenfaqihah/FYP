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

Auth::routes();

//DASHBOARD
// Route::get('/home', 'HomeController@index')->name('home');

//PROJECT
Route::get('/DM', 'ProjectController@getProject')->name('DM');

//FOLDER
Route::get('/project', 'FolderController@index')->name('project');
Route::get('/folderDetails/{id}', 'FolderController@show')->name('folderDetails');
Route::post('/project/submit', 'FolderController@store')->name('folder.submit');
// Folder edit
// Route::get('/project/edit/{id}','FolderController@edit')->name('folder.edit');
Route::get('/project/{id}', 'FolderController@destroy')->name('folder.delete');
Route::patch('/project/update/{id}', 'FolderController@update')->name('folder.update');

//TASK
Route::get('/task', 'TaskController@getTask')->name('task');
Route::post('/task/submit', 'TaskController@store')->name('task.submit');
// Task edit
Route::patch('/task/update/{id}', 'TaskController@update')->name('task.update');
Route::get('/task/delete/{id}', 'TaskController@destroy')->name('task.delete');



Route::get('events', 'EventController@index')->name('events');



//ANALYTIC
Route::get('/analytic', 'AnalyticController@getAnalytic')->name('analytic');

