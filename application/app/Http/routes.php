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

    Route::model('address', 'App\UserAddress');
    Route::resource('address', 'UserAddressController', ['except' => ['edit', 'create']]);

    Route::model('award', 'App\CourseAward');
    Route::resource('award', 'CourseAwardController', ['except' => ['edit', 'create']]);

    Route::model('contact', 'App\UserContact');
    Route::resource('contact', 'UserContactController', ['except' => ['edit', 'create']]);

    Route::model('course', 'App\Course');
    Route::resource('course', 'CourseController', ['except' => ['edit', 'create']]);

    Route::model('course_price', 'App\CoursePrice');
    Route::resource('course_price', 'CoursePriceController', ['except' => ['edit', 'create']]);

    Route::model('detail', 'App\Detail');
    Route::resource('detail', 'DetailController', ['except' => ['edit', 'create']]);

    Route::model('event', 'App\Event');
    Route::resource('event', 'EventController', ['except' => ['edit', 'create']]);

    Route::model('event_attendance', 'App\EventAttendance');
    Route::resource('event_attendance', 'EventAttendanceController', ['except' => ['edit', 'create']]);

    Route::model('mark', 'App\Mark');
    Route::resource('mark', 'MarkController', ['except' => ['edit', 'create']]);

    Route::model('news', 'App\News');
    Route::resource('news', 'NewsController', ['except' => ['edit', 'create']]);

    Route::model('payment', 'App\Payment');
    Route::resource('payment', 'PaymentController', ['except' => ['edit', 'create']]);

    Route::model('price', 'App\CoursePrice');
    Route::resource('price', 'CoursePriceController', ['except' => ['edit', 'create']]);

    Route::model('permission', 'App\Permission');
    Route::resource('permission', 'PermissionController', ['except' => ['edit', 'create']]);

    Route::model('role', 'App\User');
    Route::resource('role', 'RoleController', ['except' => ['edit', 'create']]);

    Route::model('school', 'App\School');
    Route::resource('school', 'SchoolController', ['except' => ['edit', 'create']]);

    Route::model('school_class', 'App\Class');
    Route::resource('school_class', 'SchoolClassController', ['except' => ['edit', 'create']]);

    Route::model('user', 'App\User');
    Route::get('user/search', 'UserController@search');
    Route::get('user/search/{criteria?}/{search_string}', function ($criteria, $searchString) {
        // TODO:?
    });
    Route::resource('user', 'UserController', ['except' => ['edit', 'create']]);
});
