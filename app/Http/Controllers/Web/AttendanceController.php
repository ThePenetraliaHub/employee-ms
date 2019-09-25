<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;
use App\WorkDay;
use App\Employee;
use Illuminate\Validation\ValidationException;

class AttendanceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:browse_employee_attendance', ['only' => 'index']); //index func. if cant browse then you can stll access the rest
         $this->middleware('permission:sign_in_employee', ['only' => 'sign_in']);
         $this->middleware('permission:sign_out_employee', ['only' => ['sign_out','sign_out_ind']]);
         $this->middleware('permission:browse_attendance_general_report', ['only' => 'general_report']);
         $this->middleware('permission:browse_self_attendance', ['only' => 'self_attendance']);

 

    }
    public function index()
    {
        $work_day = WorkDay::where('date', date_create('now')->format('Y-m-d'))->get()->first();

        // return view('pages.all_users.attendance.list_signed_in_staff', compact('work_day'));
        return view('pages.all_users.attendance.gen-list_signed_in_staff', compact('work_day'));
    }

    public function sign_in(WorkDay $work_day)
    {
        //Employees not signed in already
        $unsigned_in_employees = $work_day->unsigned_in_employees();

        return view('pages.all_users.attendance.create_sign_in', compact('unsigned_in_employees'));
    }

    public function sign_in_store(Request $request)
    {
        if($request->present == 0)
        {
            $rules = [
                'employee_id' => 'required',
                'present' => 'required',
                'absence_reason' => 'required'
            ];

            $customMessages = [
                'employee_id.required' => 'Please select an employee.',
                'present.required' => 'Please select the attendance status.',
                'absence_reason.required' => 'Please provide a reason why the employee is absent.',
            ];

            $this->validate($request, $rules, $customMessages); 

            $work_day = WorkDay::where('date', date_create('now')->format('Y-m-d'))->get()->first();

            $attendance = Attendance::
                join('work_days', 'work_days.id', '=', 'attendances.work_day_id')
                ->where('employee_id', $request->employee_id)
                ->where('work_day_id', $work_day->id)->get();

            if($attendance->count() > 0){
                throw ValidationException::withMessages([
                    'employee_id' => "Employee has already been signed in.",
                ]);
            }

            Attendance::create([
                'work_day_id' => $work_day->id,
                'employee_id' => $request->employee_id,
                'present' => $request->present,
                'absence_reason' => $request->absence_reason,
            ]);

            notify()->success("Successfully marked absence!","","bottomRight");
        }elseif($request->present == 1){
            $rules = [
                'employee_id' => 'required',
                'present' => 'required',
                'time_in' => 'required|date_format:H:i',
            ];

            $customMessages = [
                'employee_id.required' => 'Please select an employee.',
                'start_time.required' => 'Please choose the opening time.',
                'time_in.required' => 'Please choose the opening time.',
            ];

            $this->validate($request, $rules, $customMessages); 

            $work_day = WorkDay::where('date', date_create('now')->format('Y-m-d'))->get()->first();

            $attendance = Attendance::
                join('work_days', 'work_days.id', '=', 'attendances.work_day_id')
                ->where('employee_id', $request->employee_id)
                ->where('work_day_id', $work_day->id)->get();
                
            if($attendance->count() > 0){
                throw ValidationException::withMessages([
                    'employee_id' => "Employee has already been signed in.",
                ]);
            }

            Attendance::create([
                'work_day_id' => $work_day->id,
                'employee_id' => $request->employee_id,
                'time_in' => $request->time_in,
                'present' => $request->present,
            ]);

            notify()->success("Successfully signed in!","","bottomRight");
        }

        return redirect()->route('attendance.index');
    }

    public function sign_out_ind(Attendance $attendance){
        return view('pages.all_users.attendance.create_sign_out_ind', compact('attendance'));
    }

    public function sign_out_store_ind(Request $request, Attendance $attendance){
        $rules = [
            'time_out' => 'required|date_format:H:i|after:"'.date_create($attendance->time_in)->format('H:i').'"',
        ];

        $customMessages = [
            'time_out.required' => 'Please choose the opening time.',
            'time_out.after' => 'Time out must be later of the time in.',
        ];

        $this->validate($request, $rules, $customMessages); 

        $attendance->update([
            'time_out' => $request->time_out,
        ]);

        notify()->success("Successfully signed out!","","bottomRight");

        return redirect()->route('attendance.index');
    }

    public function sign_out(WorkDay $work_day){
        $unsigned_out_employees = $work_day->unsigned_out_employees();

        return view('pages.all_users.attendance.create_sign_out', compact('work_day', 'unsigned_out_employees'));
    }

    public function sign_out_store(Request $request){
        $attendance = Attendance::
            join('work_days', function ($join) 
                {
                    $join->on('attendances.work_day_id', '=', 'work_days.id');
                })
            ->where('employee_id', $request->employee_id)
            ->where('work_days.date', date_create('now')->format('Y-m-d'))
            ->get(['attendances.*'])->first();

        $rules = [
            'employee_id' => 'required',
            'time_out' => 'required|date_format:H:i|after:"'.date_create($attendance->time_in)->format('H:i').'"',
        ];

        $customMessages = [
            'employee_id.required' => 'Please select an employee.',
            'time_out.required' => 'Please choose the opening time.',
            'time_out.after' => 'Time out must be later of the time in.',
        ];

        $this->validate($request, $rules, $customMessages); 

        $attendance->update([
            'time_out' => $request->time_out,
        ]);

        notify()->success("Successfully signed out!","","bottomRight");

        return redirect()->route('attendance.index');
    }

    public function general_report()
    {
        $employees = Employee::all();
        $work_days = WorkDay::all();
        
        return view('pages.all_users.attendance.general_report', compact('work_days', 'employees'));
    }

    public function filter_attendance_by_status(Request $request, WorkDay $work_day)
    {
        if ($request->status === "all"){
            $attendances = $work_day->present_and_absent();
        }elseif ($request->status === "absent") {
            $attendances = $work_day->absent();
        } elseif ($request->status === "present") {
            $attendances = $work_day->present();
        }

        return view('pages.all_users.attendance.included_tables.list_signed_in_staff_table', compact('attendances', 'work_day'));
    }

    public function self_attendance()
    {
        if(auth()->user()->can('browse_self_attendance')){
            $attendances = auth()->user()->owner->attendances_present_and_absent();

            return view('pages.all_users.attendance.list_self_attendance', compact('attendances'));
        }else{
            abort(403, 'Unauthorized action.');
        }  
    }
}
