<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\EmployeeProject;
use App\Project;
use App\Employee;
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
            'project_id' => 'required',
            'employee_id' => 'required',
            'details' => 'required',
            'document_url' => 'max:3000',
        ];

        $customMessages = [
            'project_id.required' => 'Please select the project.',
            'employee_id.required' => 'Please select the employee.',
            'details.required' => 'Please provide the details about employee engagement on project.',
        ];

        $this->validate($request, $rules, $customMessages); 

        if(EmployeeProject::where('project_id', $request->project_id)->where('employee_id', $request->employee_id)->count() > 1) {
            throw ValidationException::withMessages([
                'employee_id' => "Employee is already attached to this project.",
            ]);
        }

        if($request->document_url){
            $path = $request->file('document_url')->store('project', 'public');

            EmployeeProject::create([
                'project_id' => $request->
                'employee_id' => $request->
                'details' => $request->
                'document_url' => $path,
                'document_name' => $request-> 
            ]);
        }else{
            EmployeeProject::create([
                project_id
                employee_id
                details
            ]);
        }



        notify()->success("Successfully created!","","bottomRight");
        return redirect('department');
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

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect('department');
    }

    public function destroy(Department $department)
    {
        if($department->employees->count() > 0){
            notify()->warning("Department could not be deleted!, employees currently belong in the department.","Warning","bottomRight");
            return redirect('department');
        }else{
            $department->delete();
            notify()->success("Successfully Deleted!","","bottomRight");
            return redirect('department');
        }
    }
}
