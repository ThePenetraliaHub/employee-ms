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
	if(auth()->user()){
		return view('home');
	}else{
		return view('auth.login');
	}
});

Route::middleware('auth')->group(function () {
	Route::get('/profile/{user?}', 'Web\UserController@profile')->name('user.profile');
	// Route::get('/short-profile/{id}', 'Web\EmployeeController@shortProfile')->name('shortProfile');
	Route::get('/user/{user}/active', 'Web\UserController@active')->name('user.active');

	Route::resource('/education', 'Web\EducationController');
	Route::resource('/certification', 'Web\CertificationController');
	Route::resource('/skills', 'Web\SkillController');
	Route::resource('/projects', 'Web\ProjectController');
	Route::post('/task-status/{projectid}', 'Web\ProjectController@updateTaskStatus')->name('updateTaskStatus');
	Route::resource('/pay-grade', 'Web\PayGradeController');
	Route::resource('/job-title', 'Web\JobTitleController');
	Route::resource('/employee-status', 'Web\EmployeeStatusController');
	Route::resource('/department', 'Web\DepartmentController');
	Route::resource('/client', 'Web\ClientController');
	Route::resource('/employee', 'Web\EmployeeController');
	Route::resource('/employee-project', 'Web\EmployeeProjectController');
	Route::get('/tasks', 'Web\EmployeeProjectController@taskByEmployeeId')->name('tasks');
	Route::get('/task/{id}', 'Web\EmployeeProjectController@taskByProjectId')->name('task');
	Route::resource('/user', 'Web\UserController');

	Route::prefix('download')->group(function () {
        Route::get('/{education}/education', 'ReportController@index')->name('download.education');
        Route::get('/{certification}/certification', 'Web\CertificationController@download')->name('download.certification');
        Route::get('/{employee_project}/employee-project', 'Web\EmployeeProjectController@download')->name('download.employee_project');

    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('emails','pages.broadcasts.mails.emails')->name('mails');;
Route::view('compose-email','pages.broadcasts.mails.compose')->name('compose-mail');
Route::view('read-mail','pages.broadcasts.mails.read')->name('read-mail');


