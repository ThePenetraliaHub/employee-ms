<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Skill;
use App\Employee;
use App\Http\Controllers\Controller;
use Session; 
use Illuminate\Validation\Rule;

class SkillController extends Controller
{
    public function index()
     {
        $skills = Skill::all();
        return view('pages.admin.skills.list',  compact("skills"));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('pages.admin.skills.create', compact("employees"));
    }

    public function store(Request $request)
    {
        $rules = [
            'employee_id' => 'required',
            'skill_title' => 'required',
            'detail' => 'required'
        ];

        $customMessages = [
            'employee_id.required' => 'Please select an employee.',
            'skill_title.required' => 'Please provide the skill title.',
            'detail.required' => 'Please provide details about the skill.',
        ];

        $this->validate($request, $rules, $customMessages); 

        Skill::create($request->all());

        notify()->success("Successfully created!","","bottomRight");
        return redirect()->route('skills.index');
    }

    public function show($id)
    {
        $skills = Skill::where('employee_id', $id)->get();
        return view('pages.admin.skills.list', compact('skills'));
    }

    public function update(Request $request,Skill $skill)
    {
        $rules = [
            'skill_title' => 'required',
            'detail' => 'required'
        ];

        $customMessages = [
            'skill_title.required' => 'Please provide the skill title.',
            'detail.required' => 'Please provide details about the skill.',
        ];
        $this->validate($request, $rules, $customMessages);

        $skill->update($request->all());

        notify()->success("Successfully Updated!","","bottomRight");

        return redirect()->route('skills.index');
    }

    public function edit(Skill $skill)
    {
        $employees = Employee::all();
        return view('pages.admin.skills.edit', compact('skill','employees'));
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect()->route('skills.index');
    }
}
