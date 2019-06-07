<?php

namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\JobTitle;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class JobTitleController extends Controller
{
      public function index()
    {
        $job_titles = JobTitle::orderBy('id', 'desc')->paginate(10);
        return view('pages.admin.job_title.list', compact('job_titles'));
    }


    public function create()
    {
        return view('pages.admin.job_title.create'); 
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

        return redirect('job-title')->with('success','Successfully created!');
    }

   
    public function show(JobTitle $job_title)
    {
        return view('pages.admin.job_title.edit',compact('job_title'));
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

        return redirect('job-title')->with('success','Successfully Updated!');
        
    }

    public function destroy(JobTitle $job_title)
    {
        if($job_title->employees->count() > 0){
            return redirect('job-title')->with('warning','Job title could not be deleted!, employees currently attached to this job tilte.');
        }else{
            $job_title->delete();
            return redirect('job-title')->with('success','Successfully Deleted!');
        }
    }
}
