<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTaskMail;
use App\EmployeeProject;
use App\Project;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EmployeeProjectController extends Controller
{
    function __construct()

    {
        
            $this->middleware('permission:browse_employee_tasks', ['only' => 'index']);
            $this->middleware('permission:add_employee_tasks', ['only' => 'create']);
            $this->middleware('permission:read_employee_tasks', ['only' => ['task_info']]);
            $this->middleware('permission:edit_employee_tasks', ['only' => 'show']);  

    }
    public function index()
    {
        $employee_projects = EmployeeProject::orderBy('id', 'desc')->paginate();
        // return view('pages.admin.employee_project.list', compact('employee_projects'));
        return view('pages.admin.employee_project.gen-list', compact('employee_projects'));
    }

    public function create()
    {
        $projects = Project::all();
        $employees = Employee::all();
        // return view('pages.admin.employee_project.create', compact("projects", "employees"));
        return view('pages.admin.employee_project.gen-create', compact("projects", "employees"));
    }

    public function store(Request $request)
    {

        $message_headline = "A new task has been attached to you, kindly see brief details below:";
        $rules = [
            // 'project_id' => 'required',
            'employee_id' => 'required',
            'details' => 'required',
            'document_url' => 'max:3000',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ];
        
        $customMessages = [
            // 'project_id.required' => 'Please select the project.',
            'employee_id.required' => 'Please select the employee.',
            'details.required' => 'Please provide the details about employee engagement on task.',
            'start_date.required' => 'Please provide task start date',
            'end_date.required' => 'Please provide task end date',
            'status.required' => 'Please provide task status',
        ];
        
        $this->validate($request, $rules, $customMessages);

        if ($request->start_date > $request->end_date) {
            throw ValidationException::withMessages([
                'start_date' => "Task start date cannot be higher than end date.",
                'end_date' => "Task start date cannot be higher than end date.",
            ]);
        } 

        // $employee_ids = $request->input('employee_id');
        // $names = array();

        // foreach($employee_ids as $employee_id){
        //     $employee = EmployeeProject::where('project_id', $request->project_id)->where('employee_id', $employee_id);

        //     if($employee->count() > 0) {
        //         $names[] = $employee->first()->employee->name;
        //     }
        // }


        // if(count($names) > 0){
        //     throw ValidationException::withMessages([
        //         'employee_id' => "Employee". (count($names) > 1 ? "s ":" ") . implode(", ", $names). (count($names) > 1 ? " are":" is") . " already attached to this project.",
        //     ]);
        // }

        // foreach($employee_ids as $employee_id){
            if($request->document_url){
                $path = $request->file('document_url')->store('project', 'public');
                
                EmployeeProject::create([
                    'project_id' => $request->project_id,
                    // 'employee_id' => $employee_id,
                    'employee_id' => $request->employee_id,
                    'details' => $request->details,
                    'document_url' => $path,
                    'document_name' => $request->document_url->getClientOriginalName(),
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => $request->status,
                    'employee_remark'=>null,
                ]);
             
            }else{
                EmployeeProject::create([
                    'project_id' => $request->project_id,
                    // 'employee_id' => $employee_id,
                    'employee_id' => $request->employee_id,
                    'details' => $request->details,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => $request->status,
                    'employee_remark'=>null,
                ]);
            // }

            //  $employee = Employee::find($employee_id);
            $employee = Employee::find($request->employee_id);
             $project = Project::find($request->project_id);

             //Mail::to($employee->office_email)->queue(new SendTaskMail($message_headline,$employee->name,$project->name, $request->details, $request->start_date,$request->end_date));
        }

        notify()->success("Successfully created!","","bottomRight");
        return redirect('employee-project');
    }

    public function show(EmployeeProject $employee_project)
    {
        $projects = Project::all();
        $employees = Employee::all();
        // return view('pages.admin.employee_project.edit', compact("projects", "employees", "employee_project"));
        return view('pages.admin.employee_project.gen-edit', compact("projects", "employees", "employee_project"));
    }

    public function update(Request $request, EmployeeProject $employee_project){
        $message_headline = "An update was made to a task assigned to you recently, kindly see brief details below:";
        $rules = [
            // 'project_id' => 'required',
            'details' => 'required',
            'document_url' => 'max:3000',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ];

        $customMessages = [
            // 'project_id.required' => 'Please select the project.',
            'details.required' => 'Please provide the details about employee engagement on project.',
            'start_date.required' => 'Please provide task start date',
            'end_date.required' => 'Please provide task end date',
            'status.required' => 'Please provide task status',
        ];

        $this->validate($request, $rules, $customMessages); 

        // if(EmployeeProject::where('project_id', $request->project_id)->where('employee_id', $employee_project->employee->id)->first()->id != $employee_project->id) {
        //     throw ValidationException::withMessages([
        //         'employee_id' => "Employee is already attached to this project.",
        //     ]);
        // }

        if($request->document_url){
            Storage::disk('public')->delete($employee_project->document_url);
            $path = $request->file('document_url')->store('project', 'public');

            $employee_project->update([
                'project_id' => $request->project_id,
                'details' => $request->details,
                'supervisor_remark' => $request->details,
                'document_url' => $path,
                'document_name' => $request->document_url->getClientOriginalName(),
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ]);
        }else{
            $employee_project->update([
                'project_id' => $request->project_id,
                'details' => $request->details,
                'supervisor_remark' => $request->supervisor_remark,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ]);
        }
             $employee = Employee::findorfail($employee_project->employee->id);
             $project = Project::findorfail($request->project_id);

             Mail::to($employee->office_email)->queue(new SendTaskMail($message_headline,$employee->name,$project->name, $request->details, $request->start_date,$request->end_date));

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

    public function employee_tasks()
    {
        $tasks = auth()->user()->owner->tasks();

        // return view('pages.employee.tasks.list', compact('tasks'));
        return view('pages.employee.tasks.gen-list', compact('tasks'));
    }

    public function task_info(EmployeeProject $employee_project)
    {
        $team_members = EmployeeProject::all();
        // dd($team_member[0]->employee->name);
        // restrict users from accessing other users tasks via url
        if(auth()->user()->can('read_employee_tasks') && auth()->user()->owner->id == $employee_project->employee->id){
        // return view('pages.employee.tasks.show', compact('employee_project'));
        return view('pages.employee.tasks.gen-show', compact('employee_project','team_members'));
         }
          else{
            return abort('403');
          }
    }

    public function update_task(Request $request, EmployeeProject $employee_project)
    {
        $rules = [
            'status' => 'required',
            'employee_remark' =>'required',

        ];

        $customMessages = [
            'status.required' => 'Please select project status',
            'employee_remark.required' => 'Please fill in employees remark',
        ];

        $this->validate($request, $rules, $customMessages);

        $employee_project->update([
            'status' => $request->status,
            'employee_remark' => $request->employee_remark,
        ]);

        notify()->success("Successfully Updated!","","bottomRight");

        return redirect()->route('task.update', $employee_project);
    }
}
