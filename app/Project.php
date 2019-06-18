<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    
    public function employees()
    {
        return $this->belongsToMany('App\Employee')->using('App\EmployeeProject');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function supervisors()
    {
        return $this->belongsToMany('App\Employee', "employee_projects", "supervisor_id", 'project_id');
    }
}
