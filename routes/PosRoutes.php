<?php 

Route::group(['prefix' => 'pos','middleware' => 'auth'],function(){

	Route::get('/index', [
		'as' => 'pos',
		'uses' => 'PosController@pos'
	]);
	
	Route::get('vendorWiseEmployeeName/{vendorId}', [
		'as' => 'vendor-wise-employee-name',
		'uses' => 'PosController@vendorWiseEmployeeName'
	]);

	Route::get('productWiseWirehouse/{productId}', [
		'as' => 'productWiseWirehouse',
		'uses' => 'PosController@productWiseWirehouse'
	]);

	Route::get('productWiseWirehouse/{productId}', [
		'as' => 'productWiseWirehouse',
		'uses' => 'PosController@productWiseWirehouse'
	]);

	Route::get('productWiseInvoiceQuantity/{productId}', [
		'as' => 'productWiseInvoiceQuantity',
		'uses' => 'PosController@productWiseInvoiceQuantity'
	]);
	
	Route::get('productWiseRate/{productId}', [
		'as' => 'productWiseRate',
		'uses' => 'PosController@productWiseRate'
	]);
	
	Route::get('productWiseQuantity/{productId}', [
		'as' => 'productWiseQuantity',
		'uses' => 'PosController@productWiseQuantity'
	]);

	Route::post('/save-pos', [
		'as' => 'pos.save-pos',
		'uses' => 'PosController@savePos'
	]);

	Route::get('/delete-pos/{posId}', [
		'as' => 'poos-delete',
		'uses' => 'PosController@deletePos'
	]);

});