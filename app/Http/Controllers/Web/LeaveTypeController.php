<?php


namespace App\Http\Controllers\Web;

use App\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leave_types = LeaveType::orderBy('id', 'desc')->paginate(10);
        return view('pages.all_users.leave.list_leave_type', compact('leave_types'));
    }

    public function create()
    {
        return view('pages.all_users.leave.create_leave_type');
    }

    public function store(Request $request)
    {
        $rules = [
            'leave_name' => 'required|unique:leave_types,leave_name',
            'description' => "max:255",
            // 'number_of_days' => 'required|numeric',
            'number_of_days' => 'numeric',
            'eligibility' => 'required',   
            'is_active' => 'required',
            'compulsory' => 'required',
        ];

        $customMessages = [
            'leave_name.required' => 'Leave name is required',
            'leave_name.unique' => 'Leave name already exist',
            'description.max' => "Leave description must not be more than 255 characters",
            // 'number_of_days.required' => 'Numbers of leave days is required',
            'number_of_days.numeric' => 'Numbers of leave days must be a valid integer',
            'eligibility' => 'Please select the eligibity requirement',
            'is_active' => 'Please select the active status',
            'compulsory' => 'Please select the leave compulsion status',
        ];

        $this->validate($request, $rules, $customMessages);

        LeaveType::create($request->all());

        notify()->success("Successfully created!","","bottomRight");

        return redirect('leave-type');
    }

    public function show(LeavePolicy $leavePolicy)
    {
        return view('pages.leave.policy_details', compact('leavePolicy'));
    }

    public function edit(LeavePolicy $leavePolicy)
    {
        return view('pages.leave.edit_policy', compact('leavePolicy'));
    }

    public function update(Request $request, LeavePolicy $leavePolicy)
    {
        $rules = [
            'leave_name' => 'required|unique:leave_policies,leave_name,'. $leavePolicy->id,
            'type' => 'required|max:50',
            'description' => "max:255",
            'days' => 'required|numeric',
            'gender' => 'required',
            'effective_from' => "required|date|after:yesterday"
        ];

        $customMessages = [
            'leave_name.required' => 'Leave name is required',
            'leave_name.unique' => 'Leave name already exist',
            'type.required' => 'Leave type required',
            'type.max' => 'Leave type must not be more than 50 characters',
            'description.max' => "Leave description must not be more than 255 characters",
            'days.required' => 'Numbers of leave days is required',
            'days.numeric' => 'Numbers of leave days must be a valid integer',
            'gender' => 'Gender is required',
            'effective_from.required' => "Effective From date is required",
            'effective_from.after' => "Effective From date must be greater than or equal to today",

        ];

        $this->validate($request, $rules, $customMessages);

         $leavePolicy->update($request->all());


        notify()->success("Successfully updated!","","bottomRight");

        return redirect('leave-policy');
    }

    public function destroy(LeavePolicy $leavePolicy)
    {
        $leavePolicy->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('leave-policy');
    }
}
