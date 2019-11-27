<?php 

Route::group(['prefix' => 'settings','middleware' => 'auth'], function(){

	Route::get('setup',[
	'as' => 'settings.setup',
	'uses' => 'SettingsController@setup' 
	]);
	//Country
	Route::get('/add-country',[
	'as' => 'settings.add-country',
	'uses' => 'SettingsController@addCountry' 
	]);

	Route::post('/save-country',[
	'as' => 'settings.save-country.post',
	'uses' => 'SettingsController@saveCountry' 
	]);

	Route::get('/view-country',[
		'as' => 'settings.view-country',
		'uses' =>'SettingsController@viewCountry'
	]);

	Route::get('update-status/{modelReference}/{action}/{id}', [
        'as' => 'settings.update-status',
        'uses' => 'SettingsController@updateStatus'
    ]);

    Route::get('update-save-country',[
		'as' => 'settings.update-save-country',
		'uses' => 'SettingsController@updateSaveCountry'
	]);

	//Division
	Route::get('/add-division',[
	'as' => 'settings.add-division',
	'uses' => 'SettingsController@addDivision' 
	]);

	Route::post('/save-division',[
		'as' => 'settings.save-division.post',
		'uses' => 'SettingsController@saveDivision'
	]);

	Route::get('/view-division', [
		'as' => 'settings.view-division',
		'uses' => 'SettingsController@viewDivision'
	]);

	Route::get('update-save-division',[
		'as' => 'settings.update-save-division',
		'uses' => 'SettingsController@saveUpdateDivision'
	]);

	//City

	Route::get('/add-city',[
	'as' => 'settings.add-city',
	'uses' => 'SettingsController@addCity' 
	]);

	Route::get('/countryWiseDivision/{countryId}', [
		'as' => 'settings.countryWiseDivision',
		'uses' => 'SettingsController@countryWiseDivisionList'
	]);

	Route::post('/save-city', [
		'as' => 'settings.save-city.post',
		'uses' => 'SettingsController@saveCity'
	]);

	Route::get('/view-city', [
		'as' => 'settings.view-city',
		'uses' => 'SettingsController@viewCity'
	]);

	Route::get('/update-save-city',[
		'as' => 'settings.update-save-city',
		'uses' => 'SettingsController@saveUpdateCity'
	]);

});
