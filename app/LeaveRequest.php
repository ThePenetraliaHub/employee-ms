<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    public function leave_type()
    {
        return $this->belongsTo('App\LeaveType');
    }

    public function leave_messages()
    {
        return $this->hasMany('App\LeaveMessage');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
