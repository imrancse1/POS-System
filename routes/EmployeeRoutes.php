<?php 

Route::group(['prefix' => 'employee','middleware' => 'auth'],function(){

	Route::get('/index', [
		'as' => 'employee',
		'uses' => 'EmployeeController@employeeIndex'
	]);
	Route::post('/save-employee', [
		'as' => 'employee.save-employee.post',
		'uses' => 'EmployeeController@saveEmployee'
	]);
	Route::get('/delete-employee/{employeeId}', [
		'as' => 'delete-employee',
		'uses' => 'EmployeeController@deleteEmployee'
	]);
	Route::get('/edit-employee/{employeeId}', [
		'as' => 'edit-employee',
		'uses' => 'EmployeeController@editEmployee'
	]);




	
	Route::get('areaWiseZone/{vendorId}',[
				'as' => 'areaWiseZone',
				'uses' => 'EmployeeController@areaWiseZone'
	]);
	Route::get('/edit-employee/areaWiseZone/{vendorId}',[
				'as' => 'areaWiseZone',
				'uses' => 'EmployeeController@editAreaWiseZone'
	]);
	




	

	



});