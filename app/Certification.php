<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{

	protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
