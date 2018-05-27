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

Route::get('/', function () {
	return view('index');
});

Route::auth();

Route::group(['prefix' => 'user'], function(){
	Route::get('sign_in', 'UserController@sign_in');
	Route::get('sign_up', 'UserController@sign_up');
	Route::post('register', 'UserController@create');
});

Route::group(['middleware' => 'auth'], function(){
	Route::group(['prefix' => 'galangan'], function(){
		Route::get('/', 'GalanganController@index');
		Route::get('data', 'GalanganController@data')->name('galangan.data');
		Route::get('create', 'GalanganController@create');
		Route::post('store', 'GalanganController@store');
		Route::get('hapus/{id}', 'GalanganController@destroy');
		Route::get('edit/{id}', 'GalanganController@edit');
		Route::post('update/{id}', 'GalanganController@update');
	});

	Route::group(['prefix' => 'kriteria'], function(){
		Route::get('/', 'KriteriaController@index');
		Route::get('data', 'KriteriaController@data')->name('kriteria.data');
		Route::get('create', 'KriteriaController@create');
		Route::post('store', 'KriteriaController@store');
		Route::get('hapus/{id}', 'KriteriaController@destroy');
		Route::get('edit/{id}', 'KriteriaController@edit');
		Route::post('update/{id}', 'KriteriaController@update');
	});

	Route::group(['prefix' => 'perhitungan'], function(){
		Route::get('/', 'PerhitunganController@index');
		Route::get('data', 'PerhitunganController@data')->name('perhitungan.data');
		Route::post('store', 'PerhitunganController@store');
		Route::get('hapus/{id}', 'PerhitunganController@destroy');
		Route::get('perbandingan/{id}', 'PerhitunganController@perbandingan');
	});
});