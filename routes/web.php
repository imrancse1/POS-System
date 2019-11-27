<?php 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', [
	'as' => 'test',
	'uses' => 'TestController@test'
]);

Route::get('/get-data', [
	'as' => 'datatables.data',
	'uses' => 'TestController@anyData'
]);


Route::get('/employeeSearch','TestController@employeeSearch');
//Route::get('/ajaxSearch','TestController@ajaxSearch');
Route::post('/ajaxSearch', [
	'as' => 'ajaxSearch.action',
	'uses' => 'TestController@action'
]);

 ?>




