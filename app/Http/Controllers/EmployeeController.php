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
       // $departments = DB::table('department')->get();
        //$departments = DB::table('department')->pluck('department_name', 'id');
        return $employees = DB::table('employee')->orderBy('_id', 'DESC')->get();
        //return $department = DB::table('department')->orderBy('_id', 'DESC')->get();
        //$department = DB::table('department')->get();
        //$department = DB::table('users')->get();
        //print_r($department);
        //return view('dashboard.client.add_employee')->with('employee',$employee)->with('departments',$departments);
    }



    public function submitEmployee(Request $request)
    {
        $company_id=Auth::user()->_id;
        try{
            $employee = new Employee([
                'department_id' =>$request->get('department_id'),
                'employee_type' =>$request->get('employee_type'),
                'employee_name' =>$request->get('employee_name'),
                'company_id' => $company_id,
                'employee_status' => '1',
                ]);

            $employee->save();

            $request->session()->flash('success','Employee added successfully');
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
    public function destroy(Request $request,$id)
    {
        try{
            //$department = Department::find($id);
            $employee=Employee::where('_id', '=', $id)->delete();
            //$department->delete();
            //$request->session()->flash('success','Voo excluído com sucesso');
            return true;
            }catch(\Exception $error){
                //$request->session()->flash('delete','Algo deu errado. Por favor, tente novamente.');
                return false;
            }
    }

    public function active(Request $request,$id){
        try{
            $accept = Employee::find($id);
            $accept->employee_status = '1';
            $accept->save();
            //$request->session()->flash('success','Voo desativado com sucesso');
            return true;

        }catch(\Exception $error){
            //$request->session()->flash('delete','Algo deu errado. Por favor, tente novamente.');
            return false;
        }
    }


    public function deactive(Request $request,$id){
        try{
            $accept = Employee::find($id);
            $accept->employee_status = '0';
            $accept->save();
            //$request->session()->flash('success','Voo desativado com sucesso');
            return true;

        }catch(\Exception $error){
            //$request->session()->flash('delete','Algo deu errado. Por favor, tente novamente.');
            return false;
        }
    }
}
