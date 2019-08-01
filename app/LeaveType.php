<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    public function all_leave_requests()
    {
        return $this->hasMany('App\LeaveRequest');
    }

    public function approved_leave_requests()
    {
        return $this->hasMany('App\LeaveRequest')->where('approval_status', 1)->get();
    }

	public function disapproved_leave_requests()
    {
        return $this->hasMany('App\LeaveRequest')->where('approval_status', 2)->get();
    }    

    public function pending_leave_requests()
    {
        return $this->belongsTo('App\LeaveType')->where('approval_status', 0)->get();
    }    
}
