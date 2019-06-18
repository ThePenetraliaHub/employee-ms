<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\EmployeeProject;
use App\Project;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class EmployeeProjectController extends Controller
{
    public function index()
    {
        $employee_projects = EmployeeProject::orderBy('id', 'desc')->paginate(10);
        return view('pages.admin.employee_project.list', compact('employee_projects'));
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

        if(EmployeeProject::where('project_id', $request->project_id)->where('employee_id', $request->employee_id)->count() > 0) {
            throw ValidationException::withMessages([
                'employee_id' => "Employee is already attached to this project.",
            ]);
        }

        if($request->document_url){
            $path = $request->file('document_url')->store('project', 'public');

            EmployeeProject::create([
                'project_id' => $request->project_id,
                'employee_id' => $request->employee_id,
                'details' => $request->details,
                'document_url' => $path,
                'document_name' => $request->document_url->getClientOriginalName(),
            ]);
        }else{
            EmployeeProject::create([
                'project_id' => $request->project_id,
                'employee_id' => $request->employee_id,
                'details' => $request->details,
            ]);
        }

        notify()->success("Successfully created!","","bottomRight");
        return redirect('employee-project');
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

    public function destroy(EmployeeProject $employee_project)
    {
        $employee_project->delete();
        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('employee-project');
    }

    public function download(EmployeeProject $employee_project)
    {
        return response()->download(storage_path($employee_project->document), $employee_project->document_name);
    }
}
