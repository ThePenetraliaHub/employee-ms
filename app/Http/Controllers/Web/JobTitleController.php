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
            'code.required' => 'Please provide the Job Title\'s code.',
            'code.unique' => 'Job Title already exist.',
            'title.required' => 'Please provide Job Title.',
            'title.unique' => 'Employee Job Title already exist.',
            'description.required' => 'Please provide Job Description.'
        ];

        $this->validate($request, $rules, $customMessages); 

        JobTitle::create($request->all());

        return redirect('job_title')->with('success','Successfully created!');
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
