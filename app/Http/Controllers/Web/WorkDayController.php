<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkDay;

class WorkDayController extends Controller
{
    public function index()
    {
        $work_days = WorkDay::orderBy('id', 'desc')->paginate(10);
        return view('pages.all_users.attendance.list_work_day', compact('work_days'));
    }

    public function create()
    {
        return view('pages.all_users.attendance.create_work_day');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:departments,name'
        ];

        $customMessages = [
            'name.required' => 'Please provide the department\'s name.',
            'name.unique' => 'Department name already exist.',
        ];

        $this->validate($request, $rules, $customMessages); 

        Department::create($request->all());

        notify()->success("Successfully created!","","bottomRight");

        return redirect('department');
    }

    public function show(Department $department)
    {
        return view('pages.admin.departments.edit', ['department' => $department]);
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
        return redirect()->route('department.index');
    }

    public function destroy(Department $department)
    {
        if($department->employees->count() > 0){

            notify()->warning("Can't be deleted, employees belong in the department.","","bottomRight");
            return redirect('department');
        }else{
            $department->delete();

            notify()->success("Successfully Deleted!","","bottomRight");
            return redirect('department');
        }
    }
}
