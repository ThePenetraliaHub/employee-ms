<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\EmployeeStatus;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class EmployeeStatusController extends Controller
{
      public function index()
    {
        $employee_statuses = EmployeeStatus::orderBy('id', 'desc')->paginate(10);
        return view('pages.admin.employee_status.list', compact('employee_statuses'));
    }


    public function create()
    {
        return view('pages.admin.employee_status.create'); 
    }

    public function store(Request $request)
    {
       $rules = [
            'title' => 'required|unique:employee_statuses,title',
            //'description' => 'required'
        ];

        $customMessages = [
            'title.required' => 'Please provide the Employee\'s status.',
            'title.unique' => 'Employee Status already exist.',
            //'description.required' => 'Please provide the Employee\'s status description.'
        ];

        $this->validate($request, $rules, $customMessages); 

        EmployeeStatus::create($request->all());

        return redirect('employee_status')->with('success','Successfully created!');
    }

   
    public function show(Department $department)
    {
         
    }

    public function update(Request $request, Department $department){
        
    }

    public function destroy(Department $department)
    {
        
    }
}
