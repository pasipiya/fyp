<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/dashboard', 'HomeController@master');

Route::get('/dtest', function () {
    return view('home');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');




/*Client*/
Route::get('/company', 'CompanyController@index');
Route::get('/get_depatments', 'DepartmentController@index');
//Route::get('/department', 'DepartmentController@index');
Route::post('/submit_department', 'DepartmentController@submitDepartment');
Route::get('/delete_department/{id}', 'DepartmentController@destroy');
Route::get('/employee', 'EmployeeController@index');
Route::post('/submit_employee', 'EmployeeController@submitEmployee');
Route::get('/vehicle_type', 'VehicleController@index');
Route::post('/submit_vehicle_type', 'VehicleController@submitVehicleType');
Route::get('/vehicles', 'VehicleController@vehicles');
Route::post('/submit_vehicles', 'VehicleController@submitVehicles');


//Manage Vehicle
Route::get('/get_vehicles', 'VehicleController@index');
Route::post('/submit_vehicle', 'VehicleController@submitVehicle');
Route::get('/delete_vehicle/{id}', 'VehicleController@destroy');

//Get Vehicle Data
Route::get('/get_vehicle_data', 'VehicleDataAcquisitionController@index');






Route::get('/home1', function () {
    return view('home');
});


Route::group(['middleware' => ['auth', 'verify.admin']], function(){
Route::get('/testmap', function () {
    return view('testmap');
});

});

/*Test*/
Route::get('/sample', function () {
    return view('admin.sample');
});


Route::post('/testAxios', function () {
    return "hello";
});

Route::post('/ajax-request', 'HomeController@store');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('testmongo', 'HomeController@testMongo');

// Route::get('/testmap', function () {
//     return view('testmap');
// });

//Manage Department
Route::get('/get_departments', 'DepartmentController@getDepartments');
Route::get('/get_vehicle_param', 'VehicleController@getVehicleParam');










Route::get('/logout','HomeController@logout');
