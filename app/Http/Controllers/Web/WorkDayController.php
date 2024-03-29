<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\WorkDay;
use App\Imports\WorkDayImport;
use Maatwebsite\Excel\Facades\Excel;

class WorkDayController extends Controller
{
    function __construct()
    {

         $this->middleware('permission:browse_working_days'); //index func. if cant browse then you cant access the rest
         $this->middleware('permission:add_working_days', ['only' => 'create']);
         $this->middleware('permission:read_working_days', ['only' => 'show']);
         $this->middleware('permission:edit_working_days', ['only' => 'edit']);
 

    }
    public function index()
    {
        $work_days = WorkDay::orderBy('date', 'desc')->paginate(10);
        return view('pages.all_users.attendance.list_work_day', compact('work_days'));
    }

    public function create()
    {
        return view('pages.all_users.attendance.create_work_day');
    }

    public function store(Request $request)
    {
        $rules = [
            'date' => 'required|date|unique:work_days,date|after:yesterday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => "required|date_format:H:i|after:start_time"
        ];

        $customMessages = [
            'date.required' => 'Please select the date.',
            'date.unique' => 'Working day has already been profiled.',
            'date.date' => 'Please select a valid day.',
            'date.after' => 'The selected day cannot be in the past.',
            'start_time.required' => 'Please choose the opening time.',
            'start_time.date_format' => 'Please choose a valid opening time.',
            'end_time.required' => 'Please choose the closing time.',
            'end_time.date_format' => 'Please choose a valid closing time.',
            'end_time.after' => 'Closing time cannot be earlier than opening time.',
        ];

        $this->validate($request, $rules, $customMessages); 

        if($request->day_type === "Work Day"){
        	WorkDay::create($request->all());
        }else{
        	$request->start_time = null;
        	$request->end_time = null;

        	WorkDay::create([
        		'date' => $request->date,
				'start_time' => null,
				'end_time' => null,
				'day_type' => $request->day_type,
        	]);

            //Update all staffs on leave to the attendance list and state a comment for their absence reason
        }

        notify()->success("Successfully created!","","bottomRight");

        return redirect('work-day');
    }

    public function show(WorkDay $work_day)
    {
        return view('pages.all_users.attendance.daily_report', compact('work_day'));
    }

    public function edit(WorkDay $work_day)
    {
        return view('pages.all_users.attendance.edit_work_day', compact('work_day'));
    }

    public function update(Request $request, WorkDay $work_day){
        if($request->day_type === "Work Day"){
            $rules = [
                // 'date' => [
                //     'required',
                //     'date',
                //     'after:yesterday',
                //     Rule::unique('work_days')->ignore($work_day->date, 'date'),
                // ],
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time'
            ];

            $customMessages = [
                'date.required' => 'Please select the date.',
                'date.unique' => 'Working day has already been profiled.',
                'date.date' => 'Please select a valid day.',
                'date.after' => 'The selected day cannot be in the past.',
                'start_time.required' => 'Please choose the opening time.',
                'start_time.date_format' => 'Please choose a valid opening time.',
                'end_time.required' => 'Please choose the closing time.',
                'end_time.date_format' => 'Please choose a valid closing time.',
                'end_time.after' => 'Closing time cannot be earlier than opening time.',
            ];

            $this->validate($request, $rules, $customMessages);

            $work_day->update($request->all()); //why this? and the below

            $work_day->update([
                // 'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'day_type' => $request->day_type,
            ]);
        }else{
            $rules = [
                // 'date' => [
                //     'required',
                //     'date',
                //     'after:yesterday',
                //     Rule::unique('work_days')->ignore($work_day->date, 'date'),
                // ],
            ];

            $customMessages = [
                'date.required' => 'Please select the date.',
                'date.unique' => 'Working day has already been profiled.',
                'date.date' => 'Please select a valid day.',
                'date.after' => 'The selected day cannot be in the past.',
            ];

            $this->validate($request, $rules, $customMessages);

            $request->start_time = null;
            $request->end_time = null;

            $work_day->update([
                // 'date' => $request->date,
                'start_time' => null,
                'end_time' => null,
                'day_type' => $request->day_type,
            ]);
        }

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect()->route('work-day.index');
    }

    public function destroy(WorkDay $work_day)
    {
        if($work_day->attendances_on_table()->count() > 0){
            notify()->warning("Work day couldn't be deleted, attendances are attached!","","bottomRight");
            return redirect('work-day');
        }else{
            $work_day->delete();

            notify()->success("Successfully Deleted!","","bottomRight");
            return redirect('work-day');
        }
    }
    public function importdata(Request $request) 
    {
            $this->validate($request, [
                  'file'  => 'required|mimes:xls,xlsx'
                 ]);

        $path = $request->file('file')->getRealPath();

        $data = Excel::import(new WorkDayImport, $path);

        notify()->success("Excel Data Imported successfully!","","bottomRight");

        return back();

    }
}
