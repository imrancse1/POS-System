<?php 

Route::group(['prefix' => 'hr','middleware' => 'auth'],function(){

	Route::get('/employee', [
		'as' => 'hr.employee',
		'uses' => 'HRController@employeeDetails'
	]);

	Route::post('/save-personalInfo', [
		'as' => 'hr.save-personalInfo.post',
		'uses' => 'HRController@savePersonalInfoDetails'
	]);
//permanent
	Route::get('/permanentCountryWiseDivision/{countryId}', [
		'as' => 'hr.permanentCountryWiseDivision',
		'uses' => 'HRController@permanentCountryWiseDivision'
	]);
	Route::get('/permanentDivisionWiseCity/{divisionId}', [
		'as' => 'hr.permanentDivisionWiseCity',
		'uses' => 'HRController@permanentDivisionWiseCity'
	]);
//present
	Route::get('/presentCountryWiseDivision/{presentCountryId}', [
		'as' => 'hr.presentCountryWiseDivision',
		'uses' => 'HRController@presentCountryWiseDivisionList'
	]);
	Route::get('/presentDivisionWiseCity/{presentDivisionId}', [
		'as' => 'hr.presentDivisionWiseCity',
		'uses' => 'HRController@presentDivisionWiseCityList'
	]);
//Emergency 
	Route::get('/emergencyCountryWiseDivision/{emergencyCountryId}', [
		'as' => 'hr.emergencyCountryWiseDivision',
		'uses' => 'HRController@emergencyCountryWiseDivisionList'
	]);
	Route::get('/emergencyDivisionWiseCity/{emergencyDivisionId}', [
		'as' => 'hr.emergencyDivisionWiseCity',
		'uses' => 'HRController@emergencyDivisionWiseCityList'
	]);	
	
	Route::get('/single-employee-view/{id}', [
		'as' => 'hr.single-employee-view',
		'uses' => 'HRController@singleViewEmployee'
	]);

	Route::get('update-status/{modelReference}/{action}/{id}', [
        'as' => 'hr.update-status',
        'uses' => 'HRController@updateStatus'
    ]);

//Edit 
    Route::get('/employee-edit/{id}', [
		'as' => 'hr.employee-view',
		'uses' => 'HRController@employeeEdit'
	]);

//permanent
	Route::get('/employee-edit/permanentCountryWiseDivision/{countryId}', [
		'as' => 'hr.permanentCountryWiseDivision',
		'uses' => 'HRController@permanentCountryWiseDivision'
	]);

	Route::get('/employee-edit/permanentDivisionWiseCity/{divisionId}', [
		'as' => 'hr.permanentDivisionWiseCity',
		'uses' => 'HRController@permanentDivisionWiseCity'
	]);
//present
	Route::get('/employee-edit/presentCountryWiseDivision/{presentCountryId}', [
		'as' => 'hr.presentCountryWiseDivision',
		'uses' => 'HRController@presentCountryWiseDivisionList'
	]);
	Route::get('/employee-edit/presentDivisionWiseCity/{presentDivisionId}', [
		'as' => 'hr.presentDivisionWiseCity',
		'uses' => 'HRController@presentDivisionWiseCityList'
	]);
//Emergency 
	Route::get('/employee-edit/emergencyCountryWiseDivision/{emergencyCountryId}', [
		'as' => 'hr.emergencyCountryWiseDivision',
		'uses' => 'HRController@emergencyCountryWiseDivisionList'
	]);
	Route::get('/employee-edit/emergencyDivisionWiseCity/{emergencyDivisionId}', [
		'as' => 'hr.emergencyDivisionWiseCity',
		'uses' => 'HRController@emergencyDivisionWiseCityList'
	]);	

	Route::post('/update-employee-info/{personalInfoId}', [
		'as' => 'hr.update-employee-info.post',
		'uses' => 'HRController@updateEmployeeInfo'
	]);
	
    //Yajara Search
    Route::get('/employeeReports', [
    	'as' => 'hr.employeeReports',
    	'uses' => 'HRController@employeeReports'
    ]);

    Route::any('/getEmployeeReportsData', [
    	'as' => 'hr.getEmployeeReportsData.post',
    	'uses' => 'HRController@employeeReports'
    ]);

    Route::post('get-test-employee-reports', [
    	'as' => 'hr.get-test-employee-reports',
    	'uses' => 'HRController@getTestEmployeeReports'
    ]);

    Route::get('/searchAutoComplete', [
    	'as' => 'hr.searchAutoComplete',
    	'uses' => 'HRController@searchAutoComplete'
    ]);

   //User Route

    Route::get('user', [
    	'as' => 'hr.user',
    	'uses' => 'HRController@userList'
    ]);

    Route::post('/save-user', [
    	'as' => 'hr.save-user.post',
    	'uses' => 'HRController@saveUser'
    ]);
 
    Route::get('/update-user-status/{modelReference}/{action}/{id}', [
    	'as' => 'hr.update-user-status',
    	'uses' => 'HRController@updateUserStatus'
    ]);

    Route::get('/edit-user/{userId}', [
    	'as' => 'hr.edit-user',
    	'uses' => 'HRController@editUser'
    ]);

    Route::post('/update-user/{userId}', [
    	'as' => 'hr.update-user.post',
    	'uses' => 'HRController@updateUser',
    ]);

    
    Route::post('/ajaxSearch', [
	'as' => 'hr.ajaxSearch.action',
	'uses' => 'HRController@searchAction'
]);
    //Test Ajax route....
    // Route::get('/deletePersonalInfo/{deleteId}', [
    // 	'as' => 'hr.deletePersonalInfo',
    // 	'uses' => 'HRController@deletePersonalInfo'
    // ]);

    // Route::get('/inactivePersonalInfo/{inactiveId}', [
    // 	'as' => 'hr.inactivePersonalInfo',
    // 	'uses' => 'HRController@inactivePersonalInfo'
    // ]);

    // Route::get('/activePersonalInfo/{activeId}', [
    // 	'as' => 'hr.activePersonalInfo',
    // 	'uses' => 'HRController@activePersonalInfo'
    // ]);

});