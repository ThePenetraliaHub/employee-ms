<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $guarded = [];
    protected $casts = [
        'joined_date' => 'datetime',
        'date_of_birth' => 'datetime',
    ];

	public function user_info()
    {
        return $this->morphOne('App\User', 'typeable');
    }

    public function certifications()
    {
        return $this->hasMany('App\Certification');
    }

    public function educations()
    {
        return $this->hasMany('App\Education');
    }

    public function skills()
    {
        return $this->hasMany('App\Skill');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project')->using('App\EmployeeProject');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function country()
    {
        return $this->belongsTo('App\Department');
    }

    public function state()
    {
        return $this->belongsTo('App\Department');
    }

    public function city()
    {
        return $this->belongsTo('App\Department');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Employee', "supervisor_id");
    }

    public function supervise()
    {
        return $this->hasMany('App\Employee', "supervisor_id");
    }

    public function job_title()
    {
        return $this->belongsTo('App\JobTitle');
    }

    public function pay_grade()
    {
        return $this->belongsTo('App\PayGrade');
    }

    public function employee_status()
    {
        return $this->belongsTo('App\EmployeeStatus');
    }

    public function attendances_present()
    {
        return $this->hasMany('App\Attendance')->where('present', 1);
    }

    public function attendances_absent()
    {
        return DB::table('work_days')
            ->crossJoin('employees')
            ->leftJoin('attendances', function ($join) 
                {
                    $join->on('work_days.id', '=', 'attendances.work_day_id')
                         ->on('employees.id', '=', 'attendances.employee_id');
                })
            ->where('employees.id', $this->id)
            ->where(function($query)
            {
                $query->where('attendances.present', 0)
                ->orWhere('attendances.work_day_id', null);
            })
            ->get();
    }

    public function attendances_present_and_absent()
    {
        return DB::table('work_days')
            ->crossJoin('employees')
            ->leftJoin('attendances', function ($join) 
                {
                    $join->on('work_days.id', '=', 'attendances.work_day_id')
                         ->on('employees.id', '=', 'attendances.employee_id');
                })
            ->where('employees.id', $this->id)
            ->get();
    }

    public function all_leave_request()
    {
        return $this->hasMany('App\LeaveRequest');
    }

    public function approved_leave_request()
    {
        return $this->hasMany('App\LeaveRequest')->where('approval_status', 1)->get()->get();
    }

    public function pending_leave_request()
    {
        return $this->hasMany('App\LeaveRequest')->where('approval_status', 0)->get()->get();
    }

    public function disapproved_leave_request()
    {
        return $this->hasMany('App\LeaveRequest')->where('approval_status', 2)->get()->get();
    }
}
