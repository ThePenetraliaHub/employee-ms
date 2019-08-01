<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveMessage extends Model
{
    public function leave_request()
    {
        return $this->belongsTo('App\LeaveRequest');
    }

    public function sender()
    {
    	return $this->belongsTo('App\User');
    }
}
