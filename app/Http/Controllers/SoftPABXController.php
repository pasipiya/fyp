<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Department;
use App\Employee;
use App\Vehicle;
use App\SoftPABX;

class SoftPABXController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return $pabx = DB::table('soft_pabx')->get();
    }

    public function indexCompany(){
        $owner_id=Auth::user()->_id;
        $company = DB::table('companies')->where('owner_id',$owner_id)->first();
        $company_id = $company['_id']->__toString();
        return $pabxs = DB::table('soft_pabx')->get();
    }

    public function create(Request $request){
     try{
        $pabx = new SoftPABX([
            'company_id'=> $request->get('company_id'),
            'username'=> $request->get('username'),
            'pabx_number'=> $request->get('pabx_number'),
            'secret_key'=> $request->get('username'),
            'host'=> $request->get('host'),
            'status'=> 1,
        ]);
        $pabx->save();

        }catch(\Exception $error){
            $request->session()->flash('delete','Something goes wrong. Please check');
            return back();
        }
    }

    public function destroy($id)
    {
        try{
            $pabx=SoftPABX::where('_id', '=', $id)->delete();
            return true;
            }catch(\Exception $error){
                return false;
            }
    }
}
