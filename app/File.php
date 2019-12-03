<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\History;

class File extends Model
{
    //
    protected $guarded = [];
    // protected $fillaible = ['status'];

	public function histories()
    {
        return $this->hasMany('App\History');
    }
	
}
