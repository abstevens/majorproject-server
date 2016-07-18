<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'api'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('school', 'SchoolController', ['except' => ['edit']]);
    Route::resource('course', 'CourseController', ['except' => ['edit']]);
    Route::resource('user', 'UserController', ['except' => ['edit']]);
    Route::resource('event', 'EventController', ['except' => ['edit', 'create']]);
    Route::resource('news', 'NewsController', ['except' => ['edit']]);
    Route::resource('role', 'RoleController', ['except' => ['edit']]);
    Route::resource('permission', 'PermissionController', ['except' => ['edit']]);
    Route::resource('award', 'AwardController', ['except' => ['edit']]);
});
