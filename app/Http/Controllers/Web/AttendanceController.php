<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;
use App\WorkDay;

class AttendanceController extends Controller
{
    public function index()
    {
        $work_day = WorkDay::where('date', date_create('now')->format('Y-m-d'))->get()->first();
        
        return view('pages.all_users.attendance.list_signed_in_staff', compact('work_day'));
    }

    public function sign_in(WorkDay $work_day){

    }

    public function sign_out(WorkDay $work_day){

    }

    public function general_report()
    {
        $attendance = Attendance::orderBy('work_day_id', 'desc')->paginate(10);
        return view('pages.all_users.attendance.general_report', compact('attendance'));
    }
}
