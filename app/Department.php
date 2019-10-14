<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];
    protected $with = ['employees'];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }


}
