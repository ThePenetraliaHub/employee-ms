<?php

namespace App\Http\Controllers\Web;

use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    
    public function index()
    {
        //
        $employees = Employee::orderBy('id', 'desc')->paginate(10);

        return view('pages.admin.employees.list', ['employees' => $employees]);
    }

    public function create()
    {
        //
        $departments = Department::all();
        $employees = Employee::all();
        return view('pages.admin.employees.create' , ['departments' => $departments,'employees' => $employees]);
    }

    public function store(Request $request)
    {
        //

       $rules = [
            'supervisor_id' => 'required',
            'department_id' => 'required',
            'NIN' => 'required',
            'employee_number' => 'required|unique:employees,employee_number',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'joined_date' => 'required',
            'addressline1' => 'required',
            'addressline2' => 'required',
            'zip_code' => 'required',
            'home_phone' => 'required',
            'office_phone' => 'required',
            'private_email' => 'required|unique:employees,private_email',
            'office_email' => 'required |unique:employees,office_email',
            'job_title' => 'required',
            'employee_status' => 'required'

        ];

        $customMessages = [

            'supervisor_id.required' =>'Please provide the supervisor\'s name.',
            'department_id.required' =>'Please provide employees department.',
            'NIN.required' => 'Please provide NIN.',
            'NIN.unique' => 'NIN already exist.',
            'employee_number.required' =>'Please provide the employee\'s number.',
            'employee_number.unique' =>'employee\'s number already exist.',
            'firstname.required' => 'Please provide employee\'s first name.',
            'middlename.required' => 'Please provide employee\'s middle name.',
            'lastname.required' => 'Please provide employee\'s last name.',
            'date_of_birth.required' => 'Please provide employee\'s date of birth.',
            'gender.required' => 'Please provide employee\'s gender.',
            'marital_status.required' => 'Please provide employee\'s marital status.',
            'joined_date.required' => 'Please provide employee\'s joined date.',
            'addressline1.required' => 'Please provide employee\'s address 1.',
            'addressline2.required' => 'Please provide employee\'s address 2.',
            'zip_code.required' => 'Please provide zip code.',
            'home_phone.required' => 'Please provide employee\'s home phone number.',
            'office_phone.required' => 'Please provide employee\'s office phone number.',
            'private_email.required' => 'Please provide employee\'s private email address.',
            'private_email.unique' => 'employee\'s private email address already exist.',
            'office_email.required' => 'Please provide employee\'s office email address.',
            'office_email.unique' => 'employee\'s office email address already exist.',
            'job_title.required' => 'Please provide employee\'s job title.',
            'employee_status.required' => 'Please provide employee\'s status.',
        ];

        $this->validate($request, $rules, $customMessages);

        Employee::create($request->all());

        return redirect('employee')->with('success','Successfully created!');

      
    }

    public function show($id)
    {
        //
        $employee = Employee::findOrFail($id);

        return view('pages.admin.employees.edit', ['employee' => $employee]);
    }

    public function edit($id)
    {
        //
        $employee = Employee::findOrFail($id);

        return view('pages.admin.employees.edit', ['employee' => $employee]);
    }

    public function update(Request $request, $id)
    {
        //
        $employee = Institution::findOrFail($id);

        $employee->name = $request->input('name');
        $employee->save();

        return redirect('employees/'.$id);
    }


     public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('employee')->with('success','Successfully Deleted!');
    }

}
