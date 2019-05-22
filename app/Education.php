<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
