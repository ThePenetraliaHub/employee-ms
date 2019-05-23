<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        //
        $departments = Department::orderBy('id', 'desc')->paginate(10);

        return view('pages.departments.list', ['departments' => $departments]);
    }

    public function create()
    {
        //
        return view('pages.departments.create');
    }

    public function store(Request $request)
    {
        //
        $rules = [
            'department_name' => 'required|unique:departments,name'
        ];

        $customMessages = [
            'department_name.required' => 'Please provide the department name.',
        ];

        $this->validate($request, $rules, $customMessages);

        $department = Department::create([
            'department_name' => $request->input('department_name'),
        ]);

        return redirect('department');
    }

    public function show($id)
    {
        //
        $department = Department::findOrFail($id);

        return view('pages.departments.show', ['department' => $department]);
    }

    public function edit($id)
    {
        //
        $department = Department::findOrFail($id);

        return view('pages.departments.edit', ['department' => $department]);
    }

    public function update(Request $request, $id)
    {
        //
        $department = Department::findOrFail($id);

        $rules = [
            'department_name' => 'required|unique:departments,name,'.$id,
        ];

        $customMessages = [
            'department_name.required' => 'Please provide the department name.',
        ];

        $this->validate($request, $rules, $customMessages);

        $department->department_name = $request->input('department_name');
        $department->save();

        return redirect('departments/'.$id);
    }

    public function destroy($id)
    {
        //
    }
}
