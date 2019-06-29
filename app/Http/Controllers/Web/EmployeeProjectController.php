<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\EmployeeProject;
use App\Project;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

        $employee_ids = $request->input('employee_id');


        $names = array();

        foreach($employee_ids as $employee_id){
            $employee = EmployeeProject::where('project_id', $request->project_id)->where('employee_id', $employee_id);

            if($employee->count() > 0) {
                $names[] = $employee->first()->employee->name;
            }
        }


        if(count($names) > 0){
            throw ValidationException::withMessages([
                'employee_id' => "Employee". (count($names) > 1 ? "s ":" ") . implode(", ", $names). (count($names) > 1 ? " are":" is") . " already attached to this project.",
            ]);
        }

        foreach($employee_ids as $employee_id){
            if($request->document_url){
                $path = $request->file('document_url')->store('project', 'public');
                
                EmployeeProject::create([
                    'project_id' => $request->project_id,
                    'employee_id' => $employee_id,
                    'details' => $request->details,
                    'document_url' => $path,
                    'document_name' => $request->document_url->getClientOriginalName(),
                ]);
             
            }else{
                EmployeeProject::create([
                    'project_id' => $request->project_id,
                    'employee_id' => $employee_id,
                    'details' => $request->details,
                ]);
            }
        }

        notify()->success("Successfully created!","","bottomRight");
        return redirect('employee-project');
    }

    public function show(EmployeeProject $employee_project)
    {
        $projects = Project::all();
        $employees = Employee::all();
        return view('pages.admin.employee_project.edit', compact("projects", "employees", "employee_project"));
    }

    public function update(Request $request, EmployeeProject $employee_project){
        $rules = [
            'project_id' => 'required',
            'details' => 'required',
            'document_url' => 'max:3000',
        ];

        $customMessages = [
            'project_id.required' => 'Please select the project.',
            'details.required' => 'Please provide the details about employee engagement on project.',
        ];

        $this->validate($request, $rules, $customMessages); 

        if(EmployeeProject::where('project_id', $request->project_id)->where('employee_id', $employee_project->employee->id)->first()->id != $employee_project->id) {
            throw ValidationException::withMessages([
                'employee_id' => "Employee is already attached to this project.",
            ]);
        }

        if($request->document_url){
            Storage::disk('public')->delete($employee_project->document_url);
            $path = $request->file('document_url')->store('project', 'public');

            $employee_project->update([
                'project_id' => $request->project_id,
                'details' => $request->details,
                'document_url' => $path,
                'document_name' => $request->document_url->getClientOriginalName(),
            ]);
        }else{
            $employee_project->update([
                'project_id' => $request->project_id,
                'details' => $request->details,
            ]);
        }

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect('employee-project');
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

     public function taskByEmployeeId()
    {
        $tasks = EmployeeProject::where('employee_id', auth()->user()->owner->id)->get();

        return view('pages.tasks.list', compact('tasks'));
    }

    public function taskByProjectId($id)
    {
         $project = Project::find($id);

         $employee_projects = EmployeeProject::where('project_id',$id)->get();

        return view('pages.tasks.task', compact('employee_projects','project'));
     
    }
}
