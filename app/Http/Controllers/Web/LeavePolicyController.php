<?php

namespace App\Http\Controllers\Web;

use App\LeavePolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeavePolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_policies = LeavePolicy::orderBy('id', 'desc')->paginate(10);
        return view('pages.leave.policy', compact('leave_policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.leave.create_policy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'leave_name' => 'required|unique:leave_policies,leave_name',
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

        LeavePolicy::create($request->all());


        notify()->success("Successfully created!","","bottomRight");

        return redirect('leave-policy');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeavePolicy  $leavePolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeavePolicy $leavePolicy)
    {
        $leavePolicy->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('leave-policy');
    }
}
