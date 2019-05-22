<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
