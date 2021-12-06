<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\AccidentHotSpot;
use App\Imports\AccidentHotSpotsImport;
use Maatwebsite\Excel\Facades\Excel;


class AccidentHotSpotsController extends Controller
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

    public function index(){
        return $data = DB::table('accident_hot_spots')->get();
    }


    public function submit(Request $request){
        $destroy=AccidentHotSpot::truncate();
        $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx,csv,txt'
        ]);
        $path = $request->file('import_file');
        $data = Excel::toArray(new AccidentHotSpotsImport, $path);
        $data=(array_slice($data[0],1));

        foreach($data as $row){
            $hotspots= new AccidentHotSpot([
                'grid_code'  => $row[0] ,
                //'lat' => $row[1],
                //'lng' => $row[2],
                'position'=> array('lat'=>$row[1],'lng'=>$row[2],)
            ]);
            $hotspots->save();
        }
        return $data;
        // foreach ($data as $row)
        // {
        //     AccidentHotSpot::create([
        //         'grid_code'  => $row[0],
        //         'lat' => $row[1],
        //         'lng' => $row[2],
        //     ]);
        // }
        // $fileName = time().'.'.$request->import_file->getClientOriginalExtension();
        // $request->import_file->move(public_path('/uploads'), $fileName);

        // $data = new AccidentHotSpot([
        //     'grid_code' =>'55',
        //     'lat' => '1',
        //     'lng' => '1',
        //     ]);
        // $data->save();

        //return response()->json(['message' => 'uploaded successfully'], 200);
    }

}
