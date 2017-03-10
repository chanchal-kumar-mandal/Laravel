<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Employee;

use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller {
	//protected $table = "employees";

	public function index(){
	  return view('employees');
	  /*$users = DB::table('employees')->get();

      return view('employees', ['result' => $users]);*/
	}

	public function store(Request $request)
	{
		//print_r($request->all());
	    // Validate the request...
	    $this->validate($request, [
	        'name'=>'required',
	        'username'=>'required|max:8',
         	'password'=>'required',
	        'address'=>'required',
         	'mobile'=>'required',
	        'email'=>'required',
         	'salary'=>'required',
	        'dateOfJoinning'=>'required'
	    ]);

	    $employee = new Employee();

	    $employee->name = $request->name;	    

	    $employee->username = $request->username;

	    $employee->password = md5($request->password);

	    $employee->address = $request->address;

	    $employee->mobile = $request->mobile;

	    $employee->email = $request->email;

	    $employee->salary = $request->salary;

	    $employee->dateOfJoinning = date('Y-m-d',strtotime($request->dateOfJoinning));

	    $employee->role = $request->role;

	    $employee->save();

	    return Redirect::to('add-employee')->with('success', 'Employee has been successfully added.');
	    
	}

	public function update(Request $request)
	{
		//print_r($request->all());
	    // Validate the request...
	    $this->validate($request, [
	        'name'=>'required',
	        'username'=>'required|max:8',
	        'address'=>'required',
         	'mobile'=>'required',
	        'email'=>'required',
         	'salary'=>'required',
	        'dateOfJoinning'=>'required'
	    ]);

	    $employee = Employee::find($request->employee_id);

	    $employee->name = $request->name;
	    

	   	$employee->username = $request->username;

	    $employee->password = md5($request->password);

	    $employee->address = $request->address;

	    $employee->mobile = $request->mobile;

	    $employee->email = $request->email;

	    $employee->salary = $request->salary;

	    $employee->dateOfJoinning = date('Y-m-d',strtotime($request->dateOfJoinning));

	    $employee->role = $request->role;

	    $employee->save();

	    return Redirect::to('edit-employee/'.$request->employee_id)->with('success', 'Employee has been successfully updated.');
	    
	}
	public function delete($id = 0)
	{
	    $employee = Employee::find($id);

	    $employee->delete();

	    return Redirect::to('employees')->with('success', 'Employee has been successfully deleted.');
	    
	}
}
