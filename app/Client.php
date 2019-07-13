<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded = [];
	protected $casts = [
        'first_contact_date' => 'datetime',
    ];
	
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
