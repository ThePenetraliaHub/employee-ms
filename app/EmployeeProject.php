<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeProject extends Pivot
{
	protected $guarded = [];
    
    public function employees()
    {
        return $this->belongsToMany('App\Employee')
            ->using('App\EmployeeProject');
    }

    public function project()
    {
        return $this->belongsTo('App\Project')
            ->using('App\EmployeeProject');
    }
}
