<?php

namespace App\Http\Controllers\Web;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    
    public function index()
    {
        //
        $employees = Employee::orderBy('id', 'desc')->paginate(10);

        return view('pages.employees.list', ['employees' => $employees]);
    }

    public function create()
    {
        //
        return view('pages.employees.create');
    }

    public function store(Request $request)
    {
        //
        $employee = Employee::create([
            'name' => $request->input('name'),

        ]);

        return redirect('employees');
    }

    public function show($id)
    {
        //
        $employee = Employee::findOrFail($id);

        return view('pages.employees.show', ['employee' => $employee]);
    }

    public function edit($id)
    {
        //
        $employee = Employee::findOrFail($id);

        return view('pages.employees.edit', ['employee' => $employee]);
    }

    public function update(Request $request, $id)
    {
        //
        $employee = Institution::findOrFail($id);

        $employee->name = $request->input('name');
        $employee->save();

        return redirect('employees/'.$id);
    }

    public function destroy($id)
    {
        //
    }
}
