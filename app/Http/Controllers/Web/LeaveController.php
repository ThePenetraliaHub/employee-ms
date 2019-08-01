<?php

namespace App\Http\Controllers\Web;

use App\Employee;
use App\Leave;
use App\LeavePolicy;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveController extends Controller
{

    public function index()
    {
        $leaves = Leave::all();
        return view('pages.leave.leave',compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::all();
        $leave_policies = LeavePolicy::all();
        return view('pages.leave.create_request',compact('employees','leave_policies'));
    }

    public function store(Request $request)
    {

        $rules = [
            'employee_id' => 'required',
            'leave_policies_id' => 'required',
            'leave_content' => "required|max:1000",
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date|after:yesterday',
            'support_doc_url' => "|file|image|mimes:jpeg,png,docx|max:1000",
        ];

        $customMessages = [
            'employee_id.required' => 'Employee is required',
            'leave_policies_id.required' => 'Leave type is required',
            'leave_content.required' => "Leave Content is required",
            'leave_content.max' => "Leave Content must not exceed 1000 characters",
            'start_date.required' => 'Start date is required',
            'start_date.date' => 'Start date should be a valid date type',
            'start_date.after' => 'Start date must not be older than today',
            'end_date.required' => 'End date is required',
            'end_date.date' => 'End date should be a valid date type',
            'end_date.after' => 'End date must not be older than start date',
            'support_doc_url' => "supported document must be of either jpeg,png,docx",
            'support_doc_url' => "supported document must not exceed 1MB",
        ];

        $this->validate($request, $rules, $customMessages);
        
       if($request->support_doc_url){
            $path = $request->file('support_doc_url')->store('leavedocuments', 'public');

          
       }
        Leave::create([
            'employee_id' =>        $request->employee_id,
            'leave_policies_id' =>  $request->leave_policies_id,
            'leave_content' =>      $request->leave_content,
            'start_date' =>         $request->start_date,
            'end_date' =>           $request->end_date,
            'support_doc_url' =>    $path,
            'support_doc_name' =>   $request->support_doc_url->getClientOriginalName(),
        ]);


        notify()->success("Successfully created!","","bottomRight");

        return redirect('leave');
    }

    public function show(Leave $leave)
    {
        //
    }

    public function edit(Leave $leave)
    {
        //
    }

    public function update(Request $request, Leave $leave)
    {
        //
    }

    public function destroy(Leave $leave)
    {
        //
    }
}
