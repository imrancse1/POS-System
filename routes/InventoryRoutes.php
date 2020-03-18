<?php 

Route::group(['prefix' => 'inventory','middleware' => 'auth'],function(){

	Route::get('/index', [
		'as' => 'inventory',
		'uses' => 'InventoryController@inventoryIndex'
	]);
	Route::post('/inventory-save', [
		'as' => 'inventory.save-inventory.post',
		'uses' => 'InventoryController@saveInventory'
	]);
	Route::get('/inventory-edit/{inventoryId}', [
		'as' => 'inventory-edit',
		'uses' => 'InventoryController@editInventory'
	]);
	Route::post('/inventory-update/{inventoryId}', [
		'as' => 'inventory.update-inventory.post',
		'uses' => 'InventoryController@updateInventory'
	]);


	Route::get('/inventory-delete/{inventoryId}', [
		'as' => 'delete-inventory',
		'uses' => 'InventoryController@deleteInventory'
	]);







	Route::get('wirehouseWiseProduct/{wirehouseId}',[
				'as' => 'wirehouseWiseProduct',
				'uses' => 'InventoryController@wirehouseWiseProduct'
	]);
	Route::get('/inventory-edit/wirehouseWiseProduct/{wirehouseId}',[
				'as' => 'wirehouseWiseProduct',
				'uses' => 'InventoryController@editWirehouseWiseProduct'
	]);

	// Route::get('/employee-edit/permanentCountryWiseDivision/{countryId}', [
	// 	'as' => 'hr.permanentCountryWiseDivision',
	// 	'uses' => 'HRController@permanentCountryWiseDivision'
	// ]);

	// Route::get('productWiseInventoryQuantity/{productId}',[
	// 			'as' => 'productWiseInventoryQuantity',
	// 			'uses' => 'InventoryController@productWiseInventoryQuantity'
	// ]);

	// Route::get('productWiseStock/{productId}',[
	// 			'as' => 'productWiseStock',
	// 			'uses' => 'InventoryController@productWiseStock'
	// ]);

	

	



});