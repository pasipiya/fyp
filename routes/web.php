<?php

use Illuminate\Support\Facades\Route;
use App\Events\GetLocation;
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


/*Auth*/
// Route::middleware('isAdmin')->get('/home', function () {
//     return redirect('/AdminDashboard');
// });

// Route::middleware('isClient')->get('/home', function () {
//     return redirect('/ClientDashboard');
// });

Route::middleware('isAdmin')->get('/adminAuthenticated', function () {
    return true;
});
Route::middleware('isClient')->get('/clientAuthenticated', function () {
    return true;
});


/*Admin*/
Route::get('/get_users_admin', 'CompanyController@getUsersAdmin')->middleware('isAdmin');
Route::get('/delete_user/{id}', 'CompanyController@destroy')->middleware('isAdmin');
Route::get('/active_user/{id}', 'CompanyController@active')->middleware('isAdmin');
Route::get('/deactive_user/{id}', 'CompanyController@deactive')->middleware('isAdmin');
Route::post('/submit_accident_hot_spots', 'AccidentHotSpotsController@submit')->middleware('isAdmin');
Route::get('/submit_accident_hot_spots', 'AccidentHotSpotsController@index')->middleware('isAdmin');
Route::get('/get_vehicle_data_admin/{id}', 'VehicleDataAcquisitionController@getVehicleDataAdmin')->middleware('isAdmin');
Route::get('/get_companies_admin', 'CompanyController@getCompaniesAdmin')->middleware('isAdmin');
Route::get('/total_vehicles', 'VehicleController@totalVehicles')->middleware('isAdmin');


//PABX
Route::get('/pabx', 'SoftPABXController@index')->middleware('isAdmin');
Route::post('/pabx', 'SoftPABXController@create')->middleware('isAdmin');
Route::get('/delete_pabx/{id}', 'SoftPABXController@destroy')->middleware('isAdmin');
Route::get('/pabx_company', 'SoftPABXController@indexCompany')->middleware('isAdmin');

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
//Route::get('/vehicles', 'VehicleController@vehicles');
Route::post('/submit_vehicles', 'VehicleController@submitVehicles');
//Route::get('/vehicle_map', 'VehicleController@vehicleMap');
Route::get('/pabx_company', 'SoftPABXController@indexCompany')->middleware('isClient');





/*Employees */
Route::get('/get_employees', 'EmployeeController@index');
Route::post('/submit_employee', 'EmployeeController@submitEmployee');
Route::get('/delete_employee/{id}', 'EmployeeController@destroy');
Route::get('/active_employee/{id}', 'EmployeeController@active');
Route::get('/deactive_employee/{id}', 'EmployeeController@deactive');



//Manage Vehicle
Route::get('/get_vehicles', 'VehicleController@index');
Route::post('/submit_vehicle', 'VehicleController@submitVehicle');
Route::get('/delete_vehicle/{id}', 'VehicleController@destroy');
Route::get('/get_vehicle_location/{id}', 'VehicleDataAcquisitionController@vehicleLocation');
Route::get('/get_vehicles_admin/{id}', 'VehicleController@getVehicleAdmin');

//Get Vehicle Data
Route::get('/get_vehicle_data', 'VehicleDataAcquisitionController@index');
//Route::get('/pusher_map', 'VehicleDataAcquisitionController@pusherMap');

//Get Vehicle Data
Route::get('/get_user_data', 'HomeController@getUserData');





//Settings
Route::get('/general_settings', 'SettingsController@indexGeneral');
Route::post('/general_settings', 'SettingsController@updateGeneral');
Route::get('/alert_settings', 'SettingsController@indexAlert');
Route::post('/alert_settings', 'SettingsController@updateAlert');


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
Route::get('/get_departments/{id}', 'DepartmentController@getDepartments');




//Get per vehicle live data
Route::get('/get_vehicle_param/{id}', 'VehicleDataAcquisitionController@getVehicleParam');
Route::get('/get_vehicle_chart_data/{id}', 'VehicleDataAcquisitionController@getVehicleChartParam');





// Route::get('/pusher_map', function (Request $request) {
//     //$lat = $request->input('lat');
//     //$long = $request->input('long');
//     $lat = '10';
//     $long = '20';
//     $location = ["lat"=>$lat, "long"=>$long];
//     event(new GetLocation($location));
//     return response()->json(['status'=>'success', 'data'=>$location]);
// });


Route::get('/pusher_map', 'VehicleDataAcquisitionController@pusherMap');


Route::get('/logout','HomeController@logout');




/*Test*/
Route::post('/test_get_companies', 'CompanyController@updateAlert');
