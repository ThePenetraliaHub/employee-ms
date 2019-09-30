<?php


namespace App\Http\Controllers\Web;

use App\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class LeaveTypeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:browse_leave_profiles'); //index func. if cant browse then you cant access the rest
         $this->middleware('permission:add_leave', ['only' => 'create']);
         $this->middleware('permission:read_leave', ['only' => 'show']);
         $this->middleware('permission:edit_leave', ['only' => 'edit']);
 

    }
    public function index()
    {
        $leave_types = LeaveType::orderBy('id', 'desc')->paginate();
        // return view('pages.all_users.leave.list_leave_type', compact('leave_types'));
        return view('pages.all_users.leave.gen-list_leave_type', compact('leave_types'));
    }

    public function create()
    {
        // return view('pages.all_users.leave.create_leave_type');
        return view('pages.all_users.leave.gen-create_leave_type');
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

        if ($request->compulsory == 'Yes' && $request->number_of_days == '0') {
            throw ValidationException::withMessages([
                'number_of_days' => "Compulsory leaves can not have an undefined number of days.",
            ]);
        }

        LeaveType::create($request->all());

        notify()->success("Successfully created!","","bottomRight");

        return redirect('leave-type');
    }

    public function show(LeaveType $leave_type)
    {
        // return view('pages.all_users.leave.leave_type_details', compact('leave_type'));
        return view('pages.all_users.leave.gen-leave_type_details', compact('leave_type'));
    }

    public function edit(LeaveType $leave_type)
    {
        // return view('pages.all_users.leave.edit_leave_type', compact('leave_type'));
        return view('pages.all_users.leave.gen-edit_leave_type', compact('leave_type'));
    }

    public function update(Request $request, LeaveType $leave_type)
    {
        $rules = [
            'leave_name' => 'required|unique:leave_types,leave_name,'. $leave_type->id,
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

        if ($request->compulsory == 'Yes' && $request->number_of_days == '0') {
            throw ValidationException::withMessages([
                'number_of_days' => "A compulsory leave can not have an undefined number of days.",
            ]);
        }

        $leave_type->update($request->all());

        notify()->success("Successfully updated!","","bottomRight");

        return redirect('leave-type');
    }

    public function destroy(LeaveType $leave_type)
    {
        if($leave_type->approved_leave_requests()->count() > 0){
            notify()->warning("Leave already approved for some employees, can't be removed!","","bottomRight");
            return redirect('leave-type');
        }else{
            $leave_type->delete();

            notify()->success("Successfully Deleted!","","bottomRight");

            return redirect('leave-type');
        }
    }
}
