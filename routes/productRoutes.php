<?php 

Route::group(['prefix' => 'product','middleware' => 'auth'],function(){

	Route::get('/index', [
		'as' => 'product',
		'uses' => 'ProductController@productIndex'
	]);

	Route::post('/save-product', [
		'as' => 'product.save-product.post',
		'uses' => 'ProductController@saveProduct'
	]);

	Route::get('/edit-product/{productId}', [
		'as' => 'product-edit',
		'uses' => 'ProductController@editProduct'
	]);

	Route::post('/update-product/{productId}', [
		'as' => 'product.update-product.post',
		'uses' => 'ProductController@updateProduct'
	]);

	Route::get('/delete-product/{productId}', [
		'as' => 'delete-product',
		'uses' => 'ProductController@deleteProduct'
	]);

	



});