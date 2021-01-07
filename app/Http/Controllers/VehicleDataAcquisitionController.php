<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Department;
use App\Employee;
use App\Vehicle;
use App\VehicleDataAcquisition;

class VehicleDataAcquisitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $company_id="1111";

        //return $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->groupBy('vehicle_id')->orderBy('_id', 'DESC')->get();
        return $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        //return response()->json($vehicleData);
        //return json_encode($vehicleData);

        //return $vehicleData = $vehicleData->unique('vehicle_id');
    }
}
