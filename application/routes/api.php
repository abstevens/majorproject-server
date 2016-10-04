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

Route::model('detail', 'App\UserDetail');
Route::resource('detail', 'UserDetailController', ['except' => ['edit', 'create']]);

Route::model('event', 'App\Event');
Route::resource('event', 'EventController', ['except' => ['edit', 'create']]);

Route::model('event_attendance', 'App\EventAttendance');
Route::resource('event_attendance', 'EventAttendanceController', ['except' => ['edit', 'create']]);

Route::model('mark', 'App\UserMark');
Route::resource('mark', 'UserMarkController', ['except' => ['edit', 'create']]);

Route::model('news', 'App\News');
Route::resource('news', 'NewsController', ['except' => ['edit', 'create']]);

Route::model('payment', 'App\Payment');
Route::resource('payment', 'PaymentController', ['except' => ['edit', 'create']]);

Route::model('price', 'App\CoursePrice');
Route::resource('price', 'CoursePriceController', ['except' => ['edit', 'create']]);

Route::model('permission', 'App\Permission');
Route::resource('permission', 'PermissionController', ['except' => ['edit', 'create']]);

Route::model('role', 'App\Role');
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