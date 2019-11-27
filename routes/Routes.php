<?php

Auth::routes();

Route::group(['middleware' =>'auth'], function(){
	Route::get('/',[
	'as' => '/',
	'uses' => 'DashBoardController@index'
	]);

	Route::get('/dashboard',[
	'as' => '/dashboard',
	'uses' => 'DashBoardController@index'
	]);

	Route::get('/home', 'HomeController@index')->name('home');
	
	Route::get('/logout',[
		'as' => 'logout',
		'uses' => 'Auth\LoginController@logout'
	]);
});




