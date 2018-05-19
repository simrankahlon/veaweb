<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Landing page after Login or Dashboard
Route::get('/', 'HomeController@index');
Route::get('/contact', 'HomeController@contact');
Route::get('/event', 'HomeController@event');
Route::get('/testimonials', 'HomeController@testimonials');
Route::get('/boosters', 'HomeController@boosters');
Route::get('/download', 'HomeController@download');
Route::get('/sitemap', 'HomeController@sitemap');
Route::get('/result', 'HomeController@result');
Route::get('/word', 'HomeController@word');
Route::get('/word/{id}', 'HomeController@getWord');
Route::get('/essay', 'HomeController@essay');
Route::get('/essay/{id}', 'HomeController@getEssay');
Route::get('/results', 'HomeController@results');
Route::get('/aboutsir', 'HomeController@aboutsir');
Route::get('/studentlogin', 'HomeController@studentlogin');
Route::post('/studentlogin', 'HomeController@postStudentlogin');
Route::get('/helpinghand', 'HomeController@helpinghand');
Route::get('/lesson', 'HomeController@lessonList');
Route::get('/lesson/{id}', 'HomeController@lesson');
Route::get('/tense', 'HomeController@tense');
Route::get('/tense/{id}', 'HomeController@tenselist');
Route::get('student/word', 'HomeController@studentWord');
Route::get('student/search', 'HomeController@studentSearch');

Route::get('student/logout', 'HomeController@studentLogout');
//Route::get('student/word/{id}', 'HomeController@studentWord');

//Route::get('student/essay', 'HomeController@essaylist');
Route::get('students/essay', 'HomeController@studentEssay');



Route::get('/list', 'HomeController@list');
Route::resource('dashboard', 'DashboardController');

#Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

#Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

#Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

#Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

#Register page
Route::get('register', function () {
   $roles = \DB::table('mst_user_type')->lists('name', 'id');
   return view('auth/register')->with('roles',$roles);
});

#User Management
Route::resource('user-management', 'UserManagementController'); //Display List of Users

#Profile
Route::resource('profile', 'ProfileController'); //Display List of Users
//Route::resource('change-password', 'ChangePasswordController'); //Change Password
Route::get('change-password', 'Auth\AuthController@viewPassword');
Route::post('change-password', 'Auth\AuthController@updatePassword');


Route::get('content', 'ContentController@index');
Route::get('content/create', 'ContentController@create');
Route::get('content/{id}/edit', 'ContentController@edit');
Route::post('content/store', 'ContentController@store');
Route::post('content/update/{id}', 'ContentController@update');
Route::any('content/{id}', 'ContentController@destroy');
//Route::resource('content', 'ContentController');ContentController@store

Route::get('word', 'WordController@index');
Route::get('admin/word/create', 'WordController@create');
Route::get('word/{id}/edit', 'WordController@edit');
Route::get('word/{id}/edit/{fileid}', 'WordController@deletefile');
Route::post('admin/word/store', 'WordController@store');
Route::post('word/update/{id}', 'WordController@update');
Route::any('word/{id}', 'WordController@destroy');

Route::get('word/{id}/delete_single_image', function($id) {
    return $data = deleteSingleImage($id);
});

Route::get('essay', 'EssayController@index');
Route::get('admin/essay/create', 'EssayController@create');
Route::get('essay/{id}/edit', 'EssayController@edit');
Route::post('admin/essay/store', 'EssayController@store');
Route::post('essay/update/{id}', 'EssayController@update');
Route::any('essay/{id}', 'EssayController@destroy');
Route::get('student/essay/{id}', 'EssayController@deleteimage');
Route::get('essay/{id}/delete_single_image', function($id) {
    return $data = deleteSingleDocument($id);
});


Route::get('school', 'SchoolController@index');
Route::get('admin/school/create', 'SchoolController@create');
Route::post('admin/school/store', 'SchoolController@store');
Route::get('school/{id}/edit', 'SchoolController@edit');
Route::post('school/update/{id}', 'SchoolController@update');
Route::any('school/{id}', 'SchoolController@destroy');


Route::get('tenses', 'TensesController@index');
Route::get('tenses/create', 'TensesController@create');
Route::get('tenses/{id}/edit', 'TensesController@edit');
Route::post('tenses/store', 'TensesController@store');
Route::post('tenses/update/{id}', 'TensesController@update');
Route::any('tenses/{id}', 'TensesController@destroy');

Route::get('studentpass', 'StudentController@index');
Route::post('admin/student/store', 'StudentController@store');