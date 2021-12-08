<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Settings;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexGeneral(){
        $owner_id=Auth::user()->_id;
        $company = DB::table('companies')->where('owner_id',$owner_id)->first();
        $company_id = $company['_id']->__toString();
        $settings = DB::table('settings')->where('company_id',$company_id)->where('setting_type','general_settings')->first();
        return $settings;
    }

    public function updateGeneral(Request $request){

        $settings_id=$request->get('id');
        $settings = Settings::find($settings_id);
        $settings->gps=$request->get('gps');
        $settings->rpm=$request->get('rpm');
        $settings->speed=$request->get('speed');
        $settings->vehicle_run_time=$request->get('vehicle_run_time');
        $settings->frequency=$request->get('frequency');
        $settings->save();
    }

    public function indexAlert(){
        $owner_id=Auth::user()->_id;
        $company = DB::table('companies')->where('owner_id',$owner_id)->first();
        $company_id = $company['_id']->__toString();
        $settings = DB::table('settings')->where('company_id',$company_id)->where('setting_type','alert_settings')->first();
        return $settings;
    }

    public function updateAlert(Request $request){
        $settings_id=$request->get('id');
        $settings = Settings::find($settings_id);
        $settings->speed_alert=$request->get('speed_alert');
        $settings->rpm_alert=$request->get('rpm_alert');
        $settings->speed_limit=$request->get('speed_limit');
        $settings->rpm_limit=$request->get('rpm_limit');
        $settings->save();
    }

}
