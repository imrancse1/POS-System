<?php 

Route::group(['prefix' => 'supplier','middleware' => 'auth'],function(){

	Route::get('/index', [
		'as' => 'supplier',
		'uses' => 'SupplierController@supplierIndex'
	]);

	Route::post('/supplier-save', [
		'as' => 'supplier.save-supplier.post',
		'uses' => 'SupplierController@saveSupplier'
	]);

	Route::get('/supplier-edit/{supplierId}', [
		'as' => 'supplier-edit',
		'uses' => 'SupplierController@editSupplier'
	]);

	Route::post('/supplier-update/{supplierId}', [
		'as' => 'supplier.update-supplier.post',
		'uses' => 'SupplierController@updateSupplier'
	]);

	Route::get('/supplier-delete/{supplierId}', [
		'as' => 'supplier-delete',
		'uses' => 'SupplierController@deleteSupplier'
	]);
	



});