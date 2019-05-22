<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
