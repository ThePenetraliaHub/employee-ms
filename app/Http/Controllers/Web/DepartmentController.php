<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('id', 'desc')->paginate(10);

        return view('pages.departments.list', ['departments' => $departments]);
    }

    public function create()
    {
        return view('pages.departments.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:departments,name'
        ];

        $customMessages = [
            'name.required' => 'Please provide the department name.',
            'name.unique' => 'Department name already exist.',
        ];

        $this->validate($request, $rules, $customMessages);

        $department = Department::create([
            'name' => $request->input('name'),
        ]);

        return redirect('department.show');
    }

    public function show(Department $department)
    {
        return view('pages.departments.show', ['department' => $department]);
    }

    public function edit(Department $department)
    {
        return view('pages.departments.edit', ['department' => $department]);
    }

    public function update(Request $request, Department $department)
    {
        $rules = [
            'name' => 'required|unique:departments,name,'.$department->id,
        ];

        $customMessages = [
            'name.required' => 'Please provide the department name.',
        ];

        $this->validate($request, $rules, $customMessages);

        //$department->name = $request->input('name');
        $department->save($request);

        return redirect('departments.index');
    }

    public function destroy($id)
    {
        //
    }
}
