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
	Route::group(['prefix' => 'department'], function () {
		Route::get('/', 'Web\DepartmentController@index')->name('department.index');
		Route::get('create', 'Web\DepartmentController@create')->name('department.create');
		Route::post('/', 'Web\DepartmentController@store')->name('department.store');
		Route::put('/{department}', 'Web\DepartmentController@update')->name('department.update');
		Route::get('/{department}/edit', 'Web\DepartmentController@edit')->name('department.edit');
		Route::delete('/delete/{department}', 'Web\DepartmentController@destroy')->name('department.destroy');
	});
});


Route::middleware('auth')->group(function () {
	Route::group(['prefix' => 'client'], function () {
		Route::get('/', 'Web\ClientController@index')->name('client.index');
		Route::get('/create', 'Web\ClientController@create')->name('client.create');
		Route::post('/', 'Web\ClientController@store')->name('client.store');

	});
});


Auth::routes();

//Route::resource('/empss', 'Web\ClientController');

Route::get('/home', 'HomeController@index')->name('home');
