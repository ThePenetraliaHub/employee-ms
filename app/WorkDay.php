<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WorkDay extends Model
{
	protected $guarded = [];
    protected $casts = [
    	'date' => 'datetime',
        'start_date' => 'time',
        'end_date' => 'time',
    ];

    public function attendances_on_table()
    {
        return $this->hasMany('App\Attendance');
    }

    public function present()
    {
        return $this->hasMany('App\Attendance')->where('present', 1)->get();
    }

    public function absent()
    {
        return DB::table('work_days')
        	->crossJoin('employees')
        	->leftJoin('attendances', function ($join) 
        		{
            		$join->on('work_days.id', '=', 'attendances.work_day_id')
            			 ->on('employees.id', '=', 'attendances.employee_id');
        		})
        	->where('work_days.id', $this->id)
        	->where(function($query)
        	{
        		$query->where('attendances.present', 0)
    			->orWhere('attendances.work_day_id', null);
        	})
            ->get();
    }

    public function late()
    {
        return $this->hasMany('App\Attendance')
        	->join('work_days', 'work_days.id', '=', 'attendances.work_day_id')
        	->where('present', 1)
        	->whereColumn('work_days.start_time', '<' , 'attendances.time_in')
        	->get();
    }

    public function early_leaving()
    {
        return $this->hasMany('App\Attendance')
        	->join('work_days', 'work_days.id', '=', 'attendances.work_day_id')
        	->where('present', 1)
        	->whereColumn('work_days.end_time', '>' , 'attendances.time_out')
        	->get();
    }

    public function over_time()
    {
        return $this->hasMany('App\Attendance')
        	->join('work_days', 'work_days.id', '=', 'attendances.work_day_id')
        	->where('present', 1)
        	->whereColumn('work_days.end_time', '<' , 'attendances.time_out')
        	->get();
    }

    public function present_and_absent()
    {
        return DB::table('work_days')
        	->crossJoin('employees')
        	->leftJoin('attendances', function ($join) 
        		{
            		$join->on('work_days.id', '=', 'attendances.work_day_id')
            			 ->on('employees.id', '=', 'attendances.employee_id');
        		})
        	->where('work_days.id', $this->id)
            ->get(['attendances.*', 'work_days.*', 'employees.*', 'employees.id as employee_id']);
    }

    public function unsigned_employees()
    {
        $employees = \App\Employee::
            join('attendances', function ($join) 
                {
                    $join->on('employees.id', '!=', 'attendances.employee_id');
                })
            ->join('work_days', function ($join) 
                {
                    $join->on('work_days.id', '=', 'attendances.work_day_id');
                })
            ->where('work_days.date', date_create('now')->format('Y-m-d'))
            ->get();

        return $employees;
    }
}
