<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;
use App\Events\LocationEvent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        //return view('dashboard.master');
        return view('dashboard.master');
    }


    public function pusherMap(){
        $lat = '10';
        $long = '20';
        //$location="hkhk";
        $location = ["lat"=>$lat, "long"=>$long];
        //$user=User::find(Auth::id());
        //event(new LocationEvent($location));
        event(new LocationEvent($location));
        //return response()->json(['status'=>'success', 'data'=>$location]);
    }



    public function testMongo()
    {
        $userID=Auth::user()->id;
        $name=Auth::user()->name;
        echo $name;

        //$user = Flight::find($flight_id);
        $user = User::find($userID);
        //$flight->flight_name = $request->get('flightName');
        $user->name = 'Pasindu Piyathilaka';
        $user->save();
        $name1=Auth::user()->name;
        echo $name1;


        //return view('testMongo');
    }

    public function apiTest()
    {

        return User::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    public function getUserData(){
        return $userData = Auth::user()->_id;
    }

}
