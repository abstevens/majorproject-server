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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
//    Route::model('course', 'App\Course');
//    Route::resource('course', 'CourseController', ['except' => ['edit', 'create']]);
//    Route::get('course/search/{search_string}', 'CourseController@search');

    Route::model('user', 'App\User');
    Route::resource('user', 'UserController', ['except' => ['edit', 'create']]);
    Route::get('user/search/{search_string}', 'UserController@search');
});

Route::model('course', 'App\Course');
Route::resource('course', 'CourseController', ['except' => ['edit', 'create']]);
Route::get('course/search/{search_string}', 'CourseController@search');

Route::model('course-award', 'App\CourseAward');
Route::resource('course/award', 'CourseAwardController', ['except' => ['edit', 'create']]);
Route::get('course/award/search/{search_string}', 'CourseAwardController@search');

Route::model('course-price', 'App\CoursePrice');
Route::resource('course/price', 'CoursePriceController', ['except' => ['edit', 'create']]);
Route::get('course/price/search/{search_string}', 'CoursePriceController@search');

Route::model('event', 'App\Event');
Route::resource('event', 'EventController', ['except' => ['edit', 'create']]);
Route::get('event/search/{search_string}', 'EventController@search');

Route::model('event-attendance', 'App\EventAttendance');
Route::resource('event/attendance', 'EventAttendanceController', ['except' => ['edit', 'create']]);
Route::get('event/attendance/search/{search_string}', 'EventAttendanceController@search');

Route::model('news', 'App\News');
Route::resource('news', 'NewsController', ['except' => ['edit', 'create']]);
Route::get('news/search/{search_string}', 'NewsController@search');

Route::model('permission', 'App\Permission');
Route::resource('permission', 'PermissionController', ['except' => ['edit', 'create']]);
Route::get('permission/search/{search_string}', 'PermissionController@search');

Route::model('role', 'App\Role');
Route::resource('role', 'RoleController', ['except' => ['edit', 'create']]);
Route::get('role/search/{search_string}', 'RoleController@search');

Route::model('school', 'App\School');
Route::resource('school', 'SchoolController', ['except' => ['edit', 'create']]);
Route::get('school/search/{search_string}', 'SchoolController@search');

Route::model('school-address', 'App\SchoolAddress');
Route::resource('school/address', 'SchoolAddressController', ['except' => ['edit', 'create']]);
Route::get('school/address/search/{search_string}', 'SchoolAddressController@search');

Route::model('school-contact', 'App\SchoolContact');
Route::resource('school/contact', 'SchoolContactController', ['except' => ['edit', 'create']]);
Route::get('school/contact/search/{search_string}', 'SchoolContactController@search');

/*
 * User
 */
Route::model('user', 'App\User');
Route::resource('user', 'UserController', ['except' => ['edit', 'create']]);
Route::get('user/search/{search_string}', 'UserController@search');

Route::model('user-address', 'App\UserAddress');
Route::resource('user/address', 'UserAddressController', ['except' => ['edit', 'create']]);
Route::get('user/address/search/{search_string}', 'UserAddressController@search');

Route::model('user-contact', 'App\UserContact');
Route::resource('user/contact', 'UserContactController', ['except' => ['edit', 'create']]);
Route::get('user/contact/search/{search_string}', 'UserContactController@search');

Route::model('user-detail', 'App\UserDetail');
Route::resource('user/detail', 'UserDetailController', ['except' => ['edit', 'create']]);
Route::get('user/detail/search/{search_string}', 'UserDetailController@search');

Route::model('user-mark', 'App\UserMark');
Route::resource('user/mark', 'UserMarkController', ['except' => ['edit', 'create']]);
Route::get('user/mark/search/{search_string}', 'UserMarkController@search');

Route::model('user-payment', 'App\UserPayment');
Route::resource('user/payment', 'UserPaymentController', ['except' => ['edit', 'create']]);
Route::get('user/payment/search/{search_string}', 'UserPaymentController@search');

/*
 * Document
 */
Route::resource('document', 'DocumentController', ['except' => ['edit', 'create']]);

//'documents/create/folder' = 'documents/create/{$type}';
//case 'folder':
//    mkdir('documents/folders');