<?php

namespace App\Http\Controllers\Web;

use App\Employee;
use App\LeaveRequest;
use App\LeaveType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use DateTime;

class LeaveRequestController extends Controller
{
    //Employee leave requests
    public function index()
    {
        if(auth()->user()->hasRole('employee')){
            $leave_requests = auth()->user()->owner->all_leave_request;
            $compulsory_leaves = auth()->user()->owner->cumpolsory_leaves();

            return view('pages.all_users.leave.list_leave_request',compact('leave_requests', 'compulsory_leaves'));
        }else{
            abort(403, 'Unauthorized action.');
        }  
    }

    public function create()
    {
        if(auth()->user()->hasRole('employee')){
            $leave_types = auth()->user()->owner->available_leave_types();
            $compulsory_leaves = auth()->user()->owner->cumpolsory_leaves();

            return view('pages.all_users.leave.create_leave_request',compact('leave_types', 'compulsory_leaves'));
        }else{
            abort(403, 'Unauthorized action.');
        }  
    }

    public function store(Request $request)
    {
        if(auth()->user()->hasRole('employee')){
            $rules = [
                'leave_type_id' => 'required',
                'leave_request_content' => "max:1000",
                'start_date' => 'required|date|after:yesterday',
                'end_date' => 'required|date|after_or_equal:start_date',
                'support_doc_url' => "|file|mimes:jpeg,png,docx,pdf|max:1000",
            ];

            $customMessages = [
                'leave_type_id.required' => 'Leave type is required',
                'leave_request_content.max' => "Leave content must not exceed 1000 characters",
                'start_date.required' => 'Start date is required',
                'start_date.date' => 'Start date should be a valid date type',
                'start_date.after' => 'Start date cannot be a date in the past',
                'end_date.required' => 'End date is required',
                'end_date.date' => 'End date should be a valid date type',
                'end_date.after' => 'End date must be older than start date',
                'support_doc_url.mimes' => "Supporting document must be of either jpeg,png,docx or pdf",
                'support_doc_url.max' => "Supporting document must not exceed 1MB",
            ];

            $this->validate($request, $rules, $customMessages);

            $leave_type = LeaveType::find($request->leave_type_id);

            $days = auth()->user()->owner->days_exhausted_for_a_leave_type($leave_type);

            //If employee is not eligible for leave, employee should not be able to apply
            if(!auth()->user()->owner->is_eligible($leave_type)){
                throw ValidationException::withMessages([
                    'leave_type_id' => "You are not qualified for this leave",
                ]);
            }

            //If employee has leave already approved within the requested date, employee should not be able to apply
            if(auth()->user()->owner->clashing_approved_requests($request->start_date, $request->end_date)->count() > 0){
                throw ValidationException::withMessages([
                    'start_date' => "You have an approved leave within these days",
                    'end_date' => "You have an approved leave within these days",
                ]);
            }

            //If leave has a predefined days, employee should not be able to apply if he/she has exhausted their days
            if($leave_type->number_of_days <= $days && $leave_type->number_of_days != 0) {
                throw ValidationException::withMessages([
                    'leave_type_id' => "You have exhausted the leave",
                ]);
            }

            //Employee should not be able to apply if the days he is applying is more than the specified number of days
            $sd = new DateTime($request->start_date);
            $ed = new DateTime($request->end_date);

            $days_applying = $ed->diff($sd)->format("%a");

            if($leave_type->number_of_days != 0 && $days_applying > ($leave_type->number_of_days - $days)){
                throw ValidationException::withMessages([
                    'start_date' => "You have only " . ($leave_type->number_of_days - $days) . " days left but selected ". $days_applying ." days",
                    'end_date'   => "You have only " . ($leave_type->number_of_days - $days) . " days left but selected ". $days_applying ." days",
                ]);
            }

            if($request->support_doc_url){
                $path = $request->file('support_doc_url')->store('leave_docs', 'public');

                LeaveRequest::create([
                    'employee_id' => auth()->user()->owner->id,
                    'leave_type_id' => $request->leave_type_id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'support_doc_url' => $path,
                    'support_doc_name' => $request->support_doc_url->getClientOriginalName(),
                    'leave_request_content' => $request->leave_request_content,
                ]);
            }else{
                LeaveRequest::create([
                    'employee_id' => auth()->user()->owner->id,
                    'leave_type_id' => $request->leave_type_id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'leave_request_content' => $request->leave_request_content,
                ]);
            }

            notify()->success("Successfully created!","","bottomRight");

            return redirect('leave-request');
        }else{
            abort(403, 'Unauthorized action.');
        } 
    }

    public function download(LeaveRequest $leave_request)
    {
        return response()->download(storage_path($leave_request->document), $leave_request->support_doc_name);
    }
}
