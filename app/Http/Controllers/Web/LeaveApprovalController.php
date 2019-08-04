<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LeaveRequest;

class LeaveApprovalController extends Controller
{
    public function index()
    {
        $leave_requests = LeaveRequest::orderBy('id', 'desc')->paginate(10);
        $staffs_on_leave = LeaveRequest::staffs_on_leave();

        return view('pages.all_users.leave.list_leave_approval',compact('leave_requests', 'staffs_on_leave'));
    }

    public function update(Request $request, LeaveRequest $leave_approval)
    {
        $rules = [
            'leave_content' => "max:1000",
            'approval_status' => 'required',
        ];

        $customMessages = [
            'leave_content.max' => "Leave content must not exceed 1000 characters",
            'approval_status.required' => 'You have to either approve or disapprove leave',
        ];

        $this->validate($request, $rules, $customMessages);

        $leave_approval->update([
            'leave_request_content' => $request->leave_request_content,
            'approval_status' => $request->approval_status,
        ]);

        notify()->success("Successfully updated!","","bottomRight");

        return redirect('leave-approval');
    }

    public function edit(LeaveRequest $leave_approval){
        $staffs_on_leave = LeaveRequest::staffs_on_leave();

        return view('pages.all_users.leave.respond_to_leave_request',compact('leave_approval', 'staffs_on_leave')); 
    }
}
