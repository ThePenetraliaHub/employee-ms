<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function states()
    {
        return $this->hasMany('App\State');
    }
}
