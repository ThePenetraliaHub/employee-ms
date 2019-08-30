<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Department;
use App\Exports\DepartmentExport;
use App\Imports\DepartmentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Session; 
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:browse_departments'); //index func. if cant browse then you cant access the rest
        $this->middleware('permission:add_departments', ['only' => 'create']);
        $this->middleware('permission:edit_departments', ['only' => 'show']);

    }

    public function index()
    {
        $departments = Department::orderBy('id', 'desc')->paginate(10);
        return view('pages.admin.departments.list', ['departments' => $departments]);
    }

    public function create()
    {
        return view('pages.admin.departments.create');
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

    public function update(Request $request, Department $department)
    {
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

    public function importdata(Request $request) 
    {
        $this->validate($request, [
            'file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('file')->getRealPath();

        $data = Excel::import(new DepartmentImport, $path);

        notify()->success("Excel Data Imported successfully!","","bottomRight");

        return back();
    }

    public function exportdata()
    {
        return Excel::download(new DepartmentExport, 'department.xlsx');
    }
}



