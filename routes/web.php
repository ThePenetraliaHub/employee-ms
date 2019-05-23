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
		Route::get('/', 'Web\DeparatmentController@index')->name('department.index');
		Route::get('create', 'Web\DeparatmentController@create')->name('department.create');
		Route::post('/', 'Web\DeparatmentController@store')->name('department.store');
		Route::put('/{department}', 'Web\DeparatmentController@update')->name('department.update');
		Route::get('/{department}/edit', 'Web\DeparatmentController@edit')->name('department.edit');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
