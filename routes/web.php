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
	Route::group(['prefix' => 'individual'], function () {
		Route::get('create', function () {
		    return view('individual.create');
		})->name("user.individual.create");

		Route::get('/view', function () {
			// $client = new \GuzzleHttp\Client();
			// $response = ($client->request('GET', route("individual.all")))->getBody();

			$accounts = App\IndividualAccount::all();

			$response = Response::json([
					        'accounts' => $accounts
					    ], 200);

		    return view('individual.view', compact('response'));
		})->name("user.individual");

		Route::get('search', function (Request $request) {
			$accounts = collect(array());
		    return view('individual.search', compact('accounts'));
		})->name("user.individual.search");

		Route::post('search', 'IndividualAccountController@search')->name('user.individual.search');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
