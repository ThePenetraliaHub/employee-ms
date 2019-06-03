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
	Route::resource('/department', 'Web\DepartmentController');
});


Route::middleware('auth')->group(function () {
	Route::resource('/client', 'Web\ClientController');
});


Route::middleware('auth')->group(function () {
	Route::resource('/employee', 'Web\EmployeeController');
});

Route::middleware('auth')->group(function () {
	Route::resource('/employee_status', 'Web\EmployeeStatusController');
});

Route::middleware('auth')->group(function () {
	Route::resource('/job_title', 'Web\JobTitleController');
});

Route::middleware('auth')->group(function () {
	Route::resource('/pay_grade', 'Web\PayGradeController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
