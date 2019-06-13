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

    public function getDocumentAttribute()
    {
        return asset('storage/'.$this->download_url);
    }
}
