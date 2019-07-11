<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepient extends Model
{
	protected $guarded = [];

    public function message()
    {
        return $this->belongsTo('App\Message');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
