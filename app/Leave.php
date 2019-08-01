<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $guarded = [];
    public function leave()
    {
        return $this->hasMany('App\Leave');
    }
}
