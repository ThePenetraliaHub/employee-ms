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
	Route::resource('/education', 'Web\EducationController');
	Route::resource('/certification', 'Web\CertificationController');
	Route::resource('/skills', 'Web\SkillController');
	Route::resource('/projects', 'Web\ProjectController');
	Route::resource('/pay-grade', 'Web\PayGradeController');
	Route::resource('/job-title', 'Web\JobTitleController');
	Route::resource('/employee-status', 'Web\EmployeeStatusController');
	Route::resource('/department', 'Web\DepartmentController');
	Route::resource('/client', 'Web\ClientController');
	Route::resource('/employee', 'Web\EmployeeController');
	Route::resource('/employee-project', 'Web\EmployeeProjectController');

	Route::resource('/user', 'Web\UserController');
	Route::get('/user/{user}/active', 'Web\UserController@active')->name('user.active');

	Route::resource('/admin', 'Web\SuperAdminController');
	Route::get('/admin/{user}/active', 'Web\SuperAdminController@active')->name('admin.active');

	Route::get('/task', 'Web\EmployeeProjectController@employee_tasks')->name('task.index');
	Route::get('/task/{employee_project}', 'Web\EmployeeProjectController@task_info')->name('task.show');
	Route::post('/task/{employee_project}', 'Web\EmployeeProjectController@update_task')->name('task.update');

	Route::prefix('download')->group(function () {
        Route::get('/{education}/education', 'Web\EducationController@download')->name('download.education');
        Route::get('/{certification}/certification', 'Web\CertificationController@download')->name('download.certification');
        Route::get('/{employee_project}/employee-project', 'Web\EmployeeProjectController@download')->name('download.employee_project');
    });

	Route::get('/profile', 'Web\UserController@profile')->name('profile');
    Route::prefix('employee')->group(function () {
        Route::get('/{employee}/profile', 'Web\UserController@employeeProfile')->name('employee.profile');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/{admin}/profile', 'Web\UserController@adminProfile')->name('admin.profile');
    });

    Route::prefix('messages')->group(function () {
        Route::get('/inbox', 'Web\MessageController@inbox')->name('message.inbox');
        Route::get('/sent', 'Web\MessageController@sent')->name('message.sent');
        Route::get('/draft', 'Web\MessageController@draft')->name('message.draft');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('emails','pages.all_users.broadcasts.mails.emails')->name('mails');;
Route::view('compose-email','pages.all_users.broadcasts.mails.compose')->name('compose-mail');
Route::view('read-mail','pages.all_users.broadcasts.mails.read')->name('read-mail');


