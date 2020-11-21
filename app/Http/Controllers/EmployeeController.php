<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Department;
use App\Employee;

class EmployeeController extends Controller
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
        $departments = DB::table('department')->get();
        //$departments = DB::table('department')->pluck('department_name', 'id');
        $employee = DB::table('employee')->orderBy('id', 'DESC')->get();
        //$department = DB::table('department')->get();
        //$department = DB::table('users')->get();
        //print_r($department);
        return view('dashboard.client.add_employee')->with('employee',$employee)->with('departments',$departments);
    }

    

    public function submitEmployee(Request $request)
    {
        try{
            $department = new Department([ 
                'department_name' =>$request->get('department_name'),
                'company_id' => '1',
                'department_status' => '1',
                ]);

            $department->save();

            $request->session()->flash('success','Depatment added successfully');
            return back();
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
    public function destroy($id)
    {
        //
    }
}
