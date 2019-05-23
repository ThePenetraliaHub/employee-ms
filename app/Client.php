<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded = [];
	
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
