<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

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
        return $this->hasMany('App\Educatution');
    }

    public function skills()
    {
        return $this->hasMany('App\Skill');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project');
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
}
