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
Route::get('events', 'EventController@index')->name('events');

//FOLDER
Route::get('/project', 'FolderController@index')->name('project');
Route::get('/folderDetails/{id}', 'FolderController@show')->name('folderDetails');
Route::post('/project/submit', 'FolderController@store')->name('folder.submit');
Route::get('/project/{id}', 'FolderController@destroy')->name('folder.delete');
Route::patch('/project/update/{id}', 'FolderController@update')->name('folder.update');

// FILE
Route::get('/fileDetails/{id}', 'FileController@show')->name('fileDetails');
Route::post('file', 'FileController@store')->name('file.submit');
Route::get('file/{id}', 'FileController@destroy')->name('file.delete');
Route::patch('file/update/{id}', 'FileController@update')->name('file.update');

// 3D
Route::get('/DM', 'ThreeController@index')->name('DM');
Route::post('Three/submit', 'ThreeController@store')->name('Three.submit');
Route::get('/Three/{id}', 'ThreeController@destroy')->name('Three.delete');
Route::patch('/Three/update/{id}', 'ThreeController@update')->name('Three.update');

//TASK
Route::get('/task', 'TaskController@getTask')->name('task');
Route::post('/task/submit', 'TaskController@store')->name('task.submit');
Route::patch('/task/update/{id}', 'TaskController@update')->name('task.update');
Route::get('/task/delete/{id}', 'TaskController@destroy')->name('task.delete');

//SEARCH
Route::get('/search', 'ThreeController@search');

//Approval
Route::get('approval', 'ApprovalController@index')->name('approval');
Route::post('approval', 'ApprovalController@store')->name('approval.submit');
Route::get('/approval/delete/{id}', 'ApprovalController@destroy')->name('approval.delete');
Route::patch('/approval/update/{id}', 'ApprovalController@update')->name('approval.update');

//Employee
Route::get('/employee', 'Auth\RegisterController@getEmployee')->name('employee');


//ANALYTIC
Route::get('/analytic', 'AnalyticController@getAnalytic')->name('analytic');

