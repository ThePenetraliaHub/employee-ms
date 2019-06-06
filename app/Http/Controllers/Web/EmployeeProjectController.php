<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Controllers\Controller;
use Session; 
use Illuminate\Validation\Rule;

class EmployeeProjectController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('id', 'desc')->paginate(10);
        return view('pages.admin.departments.list', ['departments' => $departments]);
    }

    public function create()
    {
        $projects = Project::all();
        $employees = Employee::all();
        return view('pages.admin.employee_project.create', compact("projects", "employees"));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:departments,name'
        ];

        $customMessages = [
            'name.required' => 'Please provide the department\'s name.',
            'name.unique' => 'Department name already exist.',
        ];

        $this->validate($request, $rules, $customMessages); 

        Department::create($request->all());

        return redirect('department')->with('success','Successfully created!');
    }

    public function show(Department $department)
    {
        return view('pages.admin.employee_project.edit', ['department' => $department]);
    }

    public function update(Request $request, Department $department){
        $rules = [
            'name' => [
                'required',
                Rule::unique('departments')->ignore($department->id),
            ],
        ];

        $customMessages = [
            'name.required' => 'Please provide the department\'s name.',
            'name.unique' => 'Department name already exist.',
        ];

        $this->validate($request, $rules, $customMessages);

        $department->update($request->all());

        return redirect('department')->with('success','Successfully Updated!');
    }

    public function destroy(Department $department)
    {
        if($department->employees->count() > 0){
            return redirect('department')->with('warning','Department could not be deleted!, employees currently belong in the department.');
        }else{
            $department->delete();
            return redirect('department')->with('success','Successfully Deleted!');
        }
    }
}
