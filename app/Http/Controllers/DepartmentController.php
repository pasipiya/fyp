<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Department;

class DepartmentController extends Controller
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
        return $department = DB::table('department')->orderBy('_id', 'DESC')->get();
        //$department = DB::table('department')->get();
        //$department = DB::table('users')->get();
        //print_r($department);
        //return view('dashboard.client.add_department')->with('department',$department);
    }

    public function getDepartments(){
        return $department = DB::table('department')->orderBy('id', 'DESC')->get();
    }

    public function submitDepartment(Request $request)
    {
        try{
            $department = new Department([
                'department_name' =>$request->get('department_name'),
                'company_id' => '1',
                'department_status' => '1',
                ]);
            $department->save();
            $request->session()->flash('success','Depatment added successfully');

            //return back();
        }catch(\Exception $error){
            $request->session()->flash('delete','Something goes wrong. Please check');
            return back();
        }

    }



    public function test(Request $request, $id)
    {
        try{

            echo"kdjed";
        }catch(\Exception $error){
            $request->session()->flash('delete','Algo deu errado. Por favor, tente novamente.');
            return back();
        }

    }

    public function testdep()
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


    public function addDepartment()
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['success'=>'Ajax request submitted successfully']);
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
            //$department = Department::find($id);
            $department=Department::where('_id', '=', $id)->delete();
            //$department->delete();
            //$request->session()->flash('success','Voo excluído com sucesso');
            return true;
            }catch(\Exception $error){
                //$request->session()->flash('delete','Algo deu errado. Por favor, tente novamente.');
                return false;
            }
    }
}
