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
		return redirect()->route('home');
	}else{
		return view('auth.login');
	}
})->name('base');

Route::get('deactivated', function () {
    if (!auth()->user()) {
        redirect('/');
    }

	Route::resource('/user', 'Web\UserController');
    Route::get('/user/{user}/active', 'Web\UserController@active')->name('user.active');
    if (auth()->user()->isActive()) {
        return redirect(route('home'));
    }

    return view('pages.all_users.deactivated');
})->name('deactivated');


Route::middleware('auth')->group(function () {
    Route::middleware('active')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    	Route::resource('/education', 'Web\EducationController');
    	Route::resource('/certification', 'Web\CertificationController');
    	Route::resource('/skills', 'Web\SkillController');
    	Route::resource('/projects', 'Web\ProjectController');
    	Route::get('/{id}/projects', 'Web\ProjectController@projectById')->name('project.details');
    	Route::resource('/pay-grade', 'Web\PayGradeController');
    	Route::resource('/job-title', 'Web\JobTitleController');
    	Route::resource('/employee-status', 'Web\EmployeeStatusController');
    	Route::resource('/department', 'Web\DepartmentController');
    	Route::resource('/client', 'Web\ClientController');
    	Route::get('/{id}/client', 'Web\ClientController@client_details')->name('client.details');
    	Route::resource('/employee', 'Web\EmployeeController');
    	Route::resource('/employee-project', 'Web\EmployeeProjectController');
    	Route::resource('/work-day', 'Web\WorkDayController');
        Route::resource('/leave-request', 'Web\LeaveRequestController');
        Route::resource('/leave-type', 'Web\LeaveTypeController');
        Route::resource('/leave-approval', 'Web\LeaveApprovalController');

        Route::prefix('attendace')->group(function () {
        	Route::get('/', 'Web\AttendanceController@index')->name('attendance.index');
            Route::get('/sign-in', 'Web\AttendanceController@sign_in')->name('attendance.sign_in');
            Route::post('/sign-in', 'Web\AttendanceController@sign_in_store')->name('attendance.sign_in.store');

            Route::get('/sign-out/{attendance}', 'Web\AttendanceController@sign_out_ind')->name('attendance.sign_out_ind');
            Route::post('/sign-out/{attendance}', 'Web\AttendanceController@sign_out_store_ind')->name('attendance.sign_out_ind.store');

            Route::get('/sign-out', 'Web\AttendanceController@sign_out')->name('attendance.sign_out');
            Route::post('/sign-out', 'Web\AttendanceController@sign_out_store')->name('attendance.sign_out.store');

            Route::get('/general-report', 'Web\AttendanceController@general_report')->name('attendance.general_report');

            Route::post('/filter-by-status/{work_day}', 'Web\AttendanceController@filter_attendance_by_status')->name('attendance.filter_attendance_by_status');

            Route::get('/report', 'Web\AttendanceController@self_attendance')->name('attendance.self_attendance');
        });

    	Route::resource('/user', 'Web\UserController');
    	Route::get('/user/{user}/active', 'Web\UserController@active')->name('user.active');

    	Route::resource('/admin', 'Web\SuperAdminController');
    	Route::get('/admin/{user}/active', 'Web\SuperAdminController@active')->name('admin.active');

        Route::get('/profile', 'Web\UserController@profile')->name('profile');
        Route::post('/profile/{employee}/employee', 'Web\UserController@profile_img')->name('user.profile_img');
        Route::post('/profile/{user}/admin', 'Web\UserController@admin_profile_img')->name('admin.profile_img');

        Route::prefix('employee')->group(function () {
            Route::get('/{employee}/profile', 'Web\UserController@employeeProfile')->name('employee.profile');
        });

    	Route::get('/task', 'Web\EmployeeProjectController@employee_tasks')->name('task.index');
    	Route::get('/task/{employee_project}', 'Web\EmployeeProjectController@task_info')->name('task.show');
    	Route::post('/task/{employee_project}', 'Web\EmployeeProjectController@update_task')->name('task.update');

    	Route::prefix('export')->group(function () {
            Route::get('/employees', 'Web\EmployeeController@exportdata')->name('export.excel');
        });

        Route::prefix('import')->group(function () {
           Route::post('/employees', 'Web\EmployeeController@importdata')->name('import.excel');
           Route::post('/workdays', 'Web\WorkDayController@importdata')->name('import.workday');
        });

    	Route::prefix('download')->group(function () {
            Route::get('/{education}/education', 'Web\EducationController@download')->name('download.education');
            Route::get('/{certification}/certification', 'Web\CertificationController@download')->name('download.certification');
            Route::get('/{employee_project}/employee-project', 'Web\EmployeeProjectController@download')->name('download.employee_project');
            Route::get('/{leave_request}/leave-request', 'Web\LeaveRequestController@download')->name('download.leave_request');
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
            Route::get('/trash', 'Web\MessageController@trash')->name('message.trash.index');
            Route::get('/compose', 'Web\MessageController@compose')->name('message.compose');
            Route::post('/', 'Web\MessageController@store')->name('message.store');
            Route::get('/{message}', 'Web\MessageController@show')->name('message.show');

            Route::delete('/trash/{message}', 'Web\MessageController@delete_to_trash')->name('message.trash.delete');
            Route::delete('/delete/{message}', 'Web\MessageController@delete_permernently')->name('message.delete');
            Route::post('/trash/{message}', 'Web\MessageController@recover')->name('message.trash.recover');
        });

        Route::prefix('role')->group(function () {
            Route::prefix('admin')->group(function () {
                Route::get('/', 'Web\RoleController@index_admin')->name('role.admin');
                Route::get('/create', 'Web\RoleController@create_admin')->name('role.admin.create');
                Route::get('/{role}', 'Web\RoleController@show_admin')->name('role.admin.edit');
            });

            Route::prefix('employee')->group(function () {
                Route::get('/', 'Web\RoleController@index_employee')->name('role.employee');
                Route::get('/create', 'Web\RoleController@create_employee')->name('role.employee.create');
                Route::get('/{role}', 'Web\RoleController@show_employee')->name('role.employee.edit');
            });

            Route::post('/', 'Web\RoleController@store')->name('role.store');
            Route::delete('/{role}', 'Web\RoleController@destroy')->name('role.delete');
            Route::put('/{role}', 'Web\RoleController@update')->name('role.update');
        });
    });

    // AJAX specific routes
    Route::prefix('ajax')->group(function () {
        Route::post('/states', 'Web\AjaxResourceController@getStates')->name('ajax.states');
        Route::post('/countries', 'Web\AjaxResourceController@getCountries')->name('ajax.countries');
    });
});

Auth::routes();



