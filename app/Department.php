<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $guarded = [];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function histories()
    {
        return $this->hasMany('App\History');
    }

    public function users()
    {
        return $this->hasMany('App\employee');
    }


}
