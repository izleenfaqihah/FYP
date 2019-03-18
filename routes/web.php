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
Route::get('/home', 'HomeController@index')->name('home');

//PROJECT
Route::get('/project', 'ProjectController@getProject')->name('project');


//TASK
Route::get('/task', 'TaskController@getTask')->name('task');
Route::post('/task/submit', 'TaskController@store')->name('task.submit');
Route::get('/task/delete/{id}', 'TaskController@destroy')->name('task.delete');


Route::get('events', 'EventController@index')->name('events');



//ANALYTIC
Route::get('/analytic', 'AnalyticController@getAnalytic')->name('analytic');

