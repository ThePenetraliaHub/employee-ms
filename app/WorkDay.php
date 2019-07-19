<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
	protected $guarded = [];
    protected $casts = [
    	'date' => 'datetime',
        'start_date' => 'time',
        'end_date' => 'time',
    ];
}
