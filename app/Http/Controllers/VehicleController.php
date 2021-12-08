<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Department;
use App\Employee;
use App\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $owner_id=Auth::user()->_id;
        $company = DB::table('companies')->where('owner_id',$owner_id)->first();
        $company_id = $company['_id']->__toString();
        return $vehicles = DB::table('vehicles')->where('company_id', '=',$company_id)->orderBy('_id', 'DESC')->get();

    }

    public function getVehicleAdmin($id){
        $company = DB::table('companies')->where('owner_id',$id)->first();
        $company_id = $company['_id']->__toString();
        $vehicles = DB::table('vehicles')->where("company_id",$company_id)->get();
        return $vehicles;

    }

    // public function vehicles()
    // {
    //     $vehicle_type = DB::table('vehicles')->get();
    //     $vehicles = DB::table('add_vehicles')->orderBy('id', 'DESC')->get();
    //     return view('dashboard.client.add_vehicle')->with('vehicle_type',$vehicle_type)->with('vehicles',$vehicles);
    // }

    public function submitVehicle(Request $request)
    {
        try{
            // $validator = Validator::make($request->all(), [
            //     'vehicle_image' => 'required|image64:jpeg,jpg,png'
            // ]);

            $owner_id=Auth::user()->_id;
            $company = DB::table('companies')->where('owner_id',$owner_id)->first();
            $company_id = $company['_id']->__toString();
            $vehicle = new Vehicle([
                'company_id' =>$company_id,
                'vehicle_manufacture' =>$request->get('vehicle_manufacture'),
                'vehicle_engine_type' =>$request->get('vehicle_engine_type'),
                'vehicle_model' =>$request->get('vehicle_model'),
                'vehicle_horse_power' =>$request->get('vehicle_horse_power'),
                'vehicle_type' =>$request->get('vehicle_type'),
                'vehicle_color' =>$request->get('vehicle_color'),
                'vehicle_year' =>$request->get('vehicle_year'),
                'vehicle_avarage_fuel' =>$request->get('vehicle_avarage_fuel'),
                'license_plate' =>$request->get('license_plate'),
                'vehicle_initial_mileage' =>$request->get('vehicle_initial_mileage'),
                'license_expiry_date' =>$request->get('license_expiry_date'),
                'insurance_expiry_date' =>$request->get('insurance_expiry_date'),
                'vehicle_obd_mac' =>$request->get('vehicle_obd_mac'),
                'vehicle_gps_model' =>$request->get('vehicle_gps_model'),
                //'vehicle_image' =>$request->get('vehicle_image'),
                'vehicle_in_service' =>$request->get('vehicle_in_service'),
                ]);
            $vehicle->save();
        }catch(\Exception $error){
            $request->session()->flash('delete','Something goes wrong. Please check');
            return back();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try{
            $vehicle=Vehicle::where('_id', '=', $id)->delete();
            return true;
            }catch(\Exception $error){
                return false;
            }
    }
}
