<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	protected $guarded = [];

	public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function work_day()
    {
        return $this->belongsTo('App\WorkDay');
    }
}
