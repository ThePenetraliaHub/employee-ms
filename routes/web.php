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
	Route::get('/download/{certification}/certification', 'Web\CertificationController@download')->name('download.certification');
	Route::get('/download/{education}/education', 'Web\EducationController@download')->name('download.education');
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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@user-profile')->name('home');