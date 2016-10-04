<?php
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

//Route::auth();

Route::get('/home', 'HomeController@index');

Route::model('course', 'App\Course');
Route::resource('course', 'CourseController', ['except' => ['edit', 'create']]);

Route::model('course-award', 'App\CourseAward');
Route::resource('course-award', 'CourseAwardController', ['except' => ['edit', 'create']]);

Route::model('course-price', 'App\CoursePrice');
Route::resource('course-price', 'CoursePriceController', ['except' => ['edit', 'create']]);

Route::model('event', 'App\Event');
Route::resource('event', 'EventController', ['except' => ['edit', 'create']]);

Route::model('event-attendance', 'App\EventAttendance');
Route::resource('event-attendance', 'EventAttendanceController', ['except' => ['edit', 'create']]);

Route::model('news', 'App\News');
Route::resource('news', 'NewsController', ['except' => ['edit', 'create']]);

Route::model('payment', 'App\Payment');
Route::resource('payment', 'PaymentController', ['except' => ['edit', 'create']]);

Route::model('permission', 'App\Permission');
Route::resource('permission', 'PermissionController', ['except' => ['edit', 'create']]);

Route::model('role', 'App\Role');
Route::resource('role', 'RoleController', ['except' => ['edit', 'create']]);

Route::model('school', 'App\School');
Route::resource('school', 'SchoolController', ['except' => ['edit', 'create']]);

Route::model('user', 'App\User');
Route::get('user/search', 'UserController@search');
Route::get('user/search/{criteria?}/{search_string}', function ($criteria, $searchString) {
    // TODO:?
});
Route::resource('user', 'UserController', ['except' => ['edit', 'create']]);

Route::model('user-address', 'App\UserAddress');
Route::resource('user-address', 'UserAddressController', ['except' => ['edit', 'create']]);


Route::model('user-contact', 'App\UserContact');
Route::resource('user-contact', 'UserContactController', ['except' => ['edit', 'create']]);

Route::model('user-detail', 'App\UserDetail');
Route::resource('user-detail', 'UserDetailController', ['except' => ['edit', 'create']]);

Route::model('user-mark', 'App\UserMark');
Route::resource('user-mark', 'UserMarkController', ['except' => ['edit', 'create']]);
