<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;
use App\WorkDay;
use App\Employee;

class AttendanceController extends Controller
{
    public function index()
    {
        $work_day = WorkDay::where('date', date_create('now')->format('Y-m-d'))->get()->first();

        return view('pages.all_users.attendance.list_signed_in_staff', compact('work_day'));
    }

    public function sign_in(WorkDay $work_day)
    {
        //Employees not signed in already
        $unsigned_in_employees = $work_day->unsigned_employees();

        dd($unsigned_in_employees);
        return view('pages.all_users.attendance.create_sign_in', compact('unsigned_in_employees'));
    }

    public function sign_in_store(Request $request){
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

            $attendance = Attendance::
                join('work_days', 'work_days.id', '=', 'attendances.work_day_id')
                ->where('employee_id', $request->employee_id)->get();

            if($attendance->count() > 0){
                throw ValidationException::withMessages([
                    'employee_id' => "Employee has already been signed in.",
                ]);
            }

            Attendance::create([
                'work_day_id' => $request->work_day_id,
                'employee_id' => $request->employee_id,
                'time_in' => $request->time_in,
                'time_out' => Nu,
                'present' => $request->present,
                'absence_reason' => $request->absence_reason,
            ]);
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

            $attendance = Attendance::
                join('work_days', 'work_days.id', '=', 'attendances.work_day_id')
                ->where('employee_id', $request->employee_id)->get();
                
            if($attendance->count() > 0){
                throw ValidationException::withMessages([
                    'employee_id' => "Employee has already been signed in.",
                ]);
            }
        }

        notify()->success("Successfully created!","","bottomRight");

        return redirect('attendance');
    }

    public function sign_out(WorkDay $work_day){

    }

    public function general_report()
    {
        $attendance = Attendance::orderBy('work_day_id', 'desc')->paginate(10);
        return view('pages.all_users.attendance.general_report', compact('attendance'));
    }
}
