<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $guarded = [];
    
    public function leave_type()
    {
        return $this->belongsTo('App\LeaveType');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
