<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\JobTitle;
use App\Exports\JobTitleExport;
use App\Imports\JobTitleImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class JobTitleController extends Controller
{
    function __construct()

    {

         $this->middleware('permission:browse_job_titles'); //index func. if cant browse then you cant access the rest
         $this->middleware('permission:add_job_titles', ['only' => 'create']);
         $this->middleware('permission:edit_job_titles', ['only' => 'show']);

    }

    public function index()
    {
        $job_titles = JobTitle::orderBy('id', 'desc')->paginate();
        // return view('pages.admin.job_title.list', compact('job_titles'));
        return view('pages.admin.job_title.gen-list', compact('job_titles'));
    }


    public function create()
    {
        // return view('pages.admin.job_title.create'); 
        return view('pages.admin.job_title.gen-create');
    }

    public function store(Request $request)
    {
       $rules = [
            'code' => 'required|unique:job_titles,code',
            'title' => 'required|unique:job_titles,title',
            'description' => 'required'
        ];

        $customMessages = [
            'code.required' => 'Please provide the job title\'s code.',
            'code.unique' => 'job title already exist.',
            'title.required' => 'Please provide job title.',
            'title.unique' => 'Employee job title already exist.',
            'description.required' => 'Please provide job description.'
        ];

        $this->validate($request, $rules, $customMessages); 

        JobTitle::create($request->all());

        notify()->success("Successfully created!","","bottomRight");
        return redirect('job-title');
    }

   
    public function show(JobTitle $job_title)
    {
        // return view('pages.admin.job_title.edit',compact('job_title'));
        return view('pages.admin.job_title.gen-edit',compact('job_title'));
    }

    public function update(Request $request, JobTitle $job_title){

        $rules = [
            'code' => 'required|unique:job_titles,code,'.$job_title->id,  //unique field validation on update
            'title' => 'required|unique:job_titles,title,'.$job_title->id,
            'description' => 'required'
        ];

        $customMessages = [
            'code.required' => 'Please provide the job title\'s code.',
            'code.unique' => 'job Code already exist.',
            'title.required' => 'Please provide job title.',
            'title.unique' => 'Employee job title already exist.',
            'description.required' => 'Please provide job description.'
        ];

        $this->validate($request, $rules, $customMessages); 
         $job_title->update($request->all());

         notify()->success("Successfully Updated!","","bottomRight");
        return redirect('job-title');
    }

    public function destroy(JobTitle $job_title)
    {
        if($job_title->employees->count() > 0){
            notify()->warning("Job title could not be deleted!, employees currently attached to this job tilte.","","bottomRight");
            return redirect('job-title');
        }else{
            $job_title->delete();
            notify()->success("Successfully Deleted!","","bottomRight");
            return redirect('job-title');
        }
    }

    public function importdata(Request $request) 
    {
            $this->validate($request, [
                  'file'  => 'required|mimes:xls,xlsx'
                 ]);

        $path = $request->file('file')->getRealPath();

        $data = Excel::import(new JobTitleImport, $path);

        notify()->success("Excel Data Imported successfully!","","bottomRight");

        return back();

    }

    public function exportdata()

    {
        return Excel::download(new JobTitleExport, 'jobtitle.xlsx');
    }
}
