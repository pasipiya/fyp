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
use App\Events\LocationEvent;

class VehicleDataAcquisitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $company_id=Auth::user()->_id;
        //$company_id="600140b88950000079007812";
        //$vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        //$vehicleData=[10.5,130];
        event(new LocationEvent($vehicleData));
        //return $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->groupBy('vehicle_id')->orderBy('_id', 'DESC')->get();
        //return $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        //event(new LocationEvent($vehicleData));
        //return response()->json($vehicleData);
        //return json_encode($vehicleData);

        //return $vehicleData = $vehicleData->unique('vehicle_id');
    }

    //Get vehicles clients
    public function vehicle(){
        $company_id=Auth::user()->_id;
        $vehicles = DB::table('add_vehicles')->orderBy('id', 'DESC')->get();
    }




    public function getVehicleParam(Request $request,$id){
        $vehicleData = DB::table('vehicle_data_acquisitions')->where('vehicle_id', '=',$id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        return response()->json($vehicleData);
    }





    public function pusherMap(){
        $company_id=Auth::user()->_id;

        //$vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        $vehicleData = DB::table('vehicle_data_acquisitions')->get();
        //$user=User::find(Auth::id());
        //event(new LocationEvent($location));
        event(new LocationEvent($vehicleData));
        return response()->json(['status'=>'success', 'data'=>$vehicleData]);
    }


}
