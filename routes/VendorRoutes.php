<?php 

Route::group(['prefix' => 'vendor','middleware' => 'auth'],function(){

	Route::get('/index', [
		'as' => 'vendor',
		'uses' => 'VendorController@vendorIndex'
	]);
	Route::post('/save-vendor', [
		'as' => 'vendor.save-vendor.post',
		'uses' => 'VendorController@saveVendor'
	]);
	Route::get('/edit-vendor/{vendorId}', [
		'as' => 'vendor-edit',
		'uses' => 'VendorController@editVendor'
	]);
	Route::post('/update-vendor/{vendorId}', [
		'as' => 'vendor.update-vendor.post',
		'uses' => 'VendorController@updateVendor'
	]);
	Route::get('/delete-vendor/{vendorId}', [
		'as' => 'vendor-delete',
		'uses' => 'VendorController@deleteVendor'
	]);

	
	



});