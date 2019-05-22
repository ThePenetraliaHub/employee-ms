<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    protected $guarded = [];

	public function user_info()
    {
        return $this->morphOne('App\User', 'typeable');
    }
}
