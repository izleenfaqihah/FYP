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
Route::get('/file/edit/{id}', 'FileController@edit')->name('file.edit');



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
Route::get('/task/edit/{id}', 'TaskController@edit')->name('task.edit');

//SEARCH
Route::get('search/approval', 'ApprovalController@search')->name('approval.search');
Route::get('search/employee', 'EmployeeController@search')->name('employee.search');
Route::get('search/task', 'TaskController@search')->name('task.search');

//Approval
Route::get('approval', 'ApprovalController@index')->name('approval');
Route::post('approval', 'ApprovalController@store')->name('approval.submit');
Route::get('/approval/delete/{id}', 'ApprovalController@destroy')->name('approval.delete');
Route::patch('/approval/update/{id}', 'ApprovalController@update')->name('approval.update');
Route::get('/approval/edit/{id}', 'ApprovalController@edit')->name('approval.edit');


//ADMIN
Route::get('/admin/login', 'Auth\AdminController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminController@login')->name('admin.login.submit');
Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/register', 'EmployeeController@getEmployee')->name('admin.register')->middleware('auth:admin');
Route::get('/admin/employee', 'EmployeeController@showEmployee')->name('admin.employee')->middleware('auth:admin');
Route::get('/admin/delete/{id}', 'EmployeeController@destroy')->name('admin.delete');
Route::patch('/admin/update/{id}', 'EmployeeController@update')->name('admin.update')->middleware('auth:admin');


//Employee
Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::post('/employee/submit', 'EmployeeController@store')->name('employee.submit');
Route::get('/admin/edit/{id}', 'EmployeeController@edit')->name('admin.edit')->middleware('auth:admin');



//ANALYTIC
Route::get('/analytic', 'AnalyticController@index')->name('analytic');
Route::post('/admin/analytic', 'AdminController@annual')->name('analytic.submit');
Route::post('/report', 'AnalyticController@year')->name('report.submit');

