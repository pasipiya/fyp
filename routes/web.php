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
Route::get('/clear_cache', function() {
    $exitCode = Artisan::call('cache:clear');
    echo "Clear cache";
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*Client*/
Route::get('/company', 'CompanyController@index');
Route::get('/department', 'DepartmentController@index');
//Route::get('/add_department', 'DepartmentController@addDepartment');
Route::post('/submit_department', 'DepartmentController@submitDepartment');
Route::get('/employee', 'EmployeeController@index');
Route::post('/submit_employee', 'EmployeeController@submitEmployee');
Route::get('/vehicle_type', 'VehicleController@index');
Route::post('/submit_vehicle_type', 'VehicleController@submitVehicleType');
Route::get('/vehicles', 'VehicleController@vehicles');
Route::post('/submit_vehicles', 'VehicleController@submitVehicles');

/*Test*/
Route::get('/sample', function () {
    return view('admin.sample');
});

Route::post('/ajax-request', 'HomeController@store');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('testmongo', 'HomeController@testMongo');
