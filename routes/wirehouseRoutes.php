<?php 

Route::group(['prefix' => 'wirehouse','middleware' => 'auth'],function(){

	Route::get('/index', [
		'as' => 'wirehouse',
		'uses' => 'WirehouseController@wirehouseIndex'
	]);
	Route::post('/save-wirehouse', [
		'as' => 'wirehouse.save-wirehouse.post',
		'uses' => 'WirehouseController@saveWirehouse'
	]);
	Route::get('/edit-wirehouse/{wirehouseId}', [
		'as' => 'wirehouse-edit',
		'uses' => 'WirehouseController@editWirehouse'
	]);
	Route::post('/update-wirehouse/{wirehouseId}', [
		'as' => 'wirehouse.update-wirehouse.post',
		'uses' => 'WirehouseController@updateWirehouse'
	]);
	Route::get('/delete-wirehouse/{wirehouseId}', [
		'as' => 'wirehouse-delete',
		'uses' => 'WirehouseController@deleteWirehouse'
	]);



});