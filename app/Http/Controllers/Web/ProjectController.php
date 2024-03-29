<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Project;
use App\Client;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    function __construct()
    {

         $this->middleware('permission:browse_projects', ['only' => 'index']); //index func. if cant browse then you cant access the rest
         $this->middleware('permission:add_projects', ['only' => 'create']);
         $this->middleware('permission:read_projects', ['only' => 'projectById']);
         $this->middleware('permission:edit_projects', ['only' => 'show']);
 

    }
    public function index()
    {
       $projects = Project::orderBy('id', 'desc')->paginate(200);
        return view('pages.admin.projects.list', compact('projects'));
    }

     public function projectById($id){
        $details = Project::find($id);
        return view('pages.admin.projects.project_details', compact('details'));
    }

    public function create()
    {
       $clients = Client::all();
       return view('pages.admin.projects.create',compact("clients"));
    }

    public function store(Request $request)
    {
     $rules = [
            'name' => 'required|unique:projects,name',
            'details' => 'required',
            'client_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ];

        $customMessages = [
            'name.unique' => 'Please project name already exist',
            'name.required' => 'Please provide project name',
            'details.required' => 'Please provide project details',
            'client_id.required' => 'Please provide project client',
            'start_date.required' => 'Please provide project start date',
            'end_date.required' => 'Please provide project end date',
            'status.required' => 'Please provide project status',
        ];

        $this->validate($request, $rules, $customMessages);

        if ($request->start_date > $request->end_date) {
            throw ValidationException::withMessages([
                'start_date' => "Project start date cannot be higher than end date.",
                'end_date' => "Project start date cannot be higher than end date.",
            ]);
        }

        Project::create($request->all());

        notify()->success("Successfully created!","","bottomRight");
        return redirect('projects');
    }

    public function show(Project $project)
    {
        $clients = Client::all();
        return view('pages.admin.projects.edit', compact('project','clients'));
    }

    public function update(Request $request, Project $project)
    {
        $rules = [
            'name' => 'required|unique:projects,name,'. $project->id,
            'details' => 'required',
            'client_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ];

        $customMessages = [
            'name.unique' => 'Please project name already exist',
            'name.required' => 'Please provide project name',
            'details.required' => 'Please provide project details',
            'client_id.required' => 'Please provide project client',
            'start_date.required' => 'Please provide project start date',
            'end_date.required' => 'Please provide project end date',
            'status.required' => 'Please provide project status',
        ];

        $this->validate($request, $rules, $customMessages);

        $project->update($request->all());

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect('projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('projects');
    }
}
