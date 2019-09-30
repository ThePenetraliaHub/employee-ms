<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LeaveRequest;
use Illuminate\Validation\ValidationException;

class LeaveApprovalController extends Controller
{

    function __construct()
    {
       
         $this->middleware('permission:approve_unapprove_leave', ['only' => ['index','edit']]);

    }
    public function index()
    {
        $leave_requests = LeaveRequest::orderBy('id', 'desc')->paginate(10);
        $staffs_on_leave = LeaveRequest::staffs_on_leave();

        // return view('pages.all_users.leave.list_leave_approval',compact('leave_requests', 'staffs_on_leave'));
        return view('pages.all_users.leave.gen-list_leave_approval',compact('leave_requests', 'staffs_on_leave'));
        
    }

    public function update(Request $request, LeaveRequest $leave_approval)
    {
        $rules = [
            'leave_reply_content' => "max:1000",
            'approval_status' => 'required',
        ];

        $customMessages = [
            'leave_reply_content.max' => "Leave content must not exceed 1000 characters",
            'approval_status.required' => 'You have to either approve or disapprove leave',
        ];

        $this->validate($request, $rules, $customMessages);

        //If employee has leave already approved within the requested date, employee should not be able to apply
        if($request->approval_status == '1' && $leave_approval->employee->clashing_approved_requests($leave_approval->start_date, $leave_approval->end_date)->count() > 0){
            throw ValidationException::withMessages([
                'approval_status' => "Employee already have an approved leave within those date ranges",
            ]);
        }

        $leave_approval->update([
            'leave_reply_by' => auth()->user()->id,
            'leave_reply_content' => $request->leave_reply_content,
            'approval_status' => $request->approval_status,
        ]);

        notify()->success("Successfully updated!","","bottomRight");

        return redirect('leave-approval');
    }

    public function edit(LeaveRequest $leave_approval)
    {
        $staffs_on_leave = LeaveRequest::staffs_on_leave();

        return view('pages.all_users.leave.respond_to_leave_request',compact('leave_approval', 'staffs_on_leave')); 
    }
}
