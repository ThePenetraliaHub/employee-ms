<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayGrade extends Model
{
    protected $guarded = [];
    
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
