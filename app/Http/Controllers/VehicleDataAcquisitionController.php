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
        /*
        $company_id=Auth::user()->_id;
        $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        event(new LocationEvent($vehicleData));
        */
        //$company_id="600140b88950000079007812";
        //$vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        //$vehicleData=[10.5,130];

        //return $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->groupBy('vehicle_id')->orderBy('_id', 'DESC')->get();
        //return $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        //event(new LocationEvent($vehicleData));
        //return response()->json($vehicleData);
        //return json_encode($vehicleData);

        //return $vehicleData = $vehicleData->unique('vehicle_id');

        $owner_id=Auth::user()->_id;
        $company = DB::table('companies')->where('owner_id',$owner_id)->first();
        $company_id = $company['_id']->__toString();
        $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        event(new LocationEvent($vehicleData));

    }

    //Get vehicles clients
    public function vehicle(){
        $company_id=Auth::user()->_id;
        return $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
    }


    public function vehicleLocation(){
        $company_id=Auth::user()->_id;
        $vehicle_id="606ec433800a0000db000558";
        return $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$company_id)->where('vehicle_id', '=',$vehicle_id)->orderBy('_id', 'DESC')->take(40)->get();
    }



    public function getVehicleParam(Request $request,$id){
        $vehicleData = DB::table('vehicle_data_acquisitions')->where('vehicle_id', '=',$id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        return response()->json($vehicleData);
    }


    public function getVehicleChartParam(Request $request,$id){
        //$vehicleData = DB::table('vehicle_data_acquisitions')->where('vehicle_id', '=',$id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
        $vehicleChartData = DB::table('vehicle_data_acquisitions')->select('time_send','speed','rpm')->where('vehicle_id', '=',$id)->orderBy('_id', 'DESC')->take(100)->get();
        //return response()->json($vehicleChartData);
        return $vehicleChartData;
    }

    public function getVehicleDataAdmin($id){
        $vehicleData = DB::table('vehicle_data_acquisitions')->where('company_id', '=',$id)->orderBy('_id', 'DESC')->get()->unique('vehicle_id');
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
