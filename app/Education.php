<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $guarded = [];
	
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function getDocumentAttribute()
    {
        return 'app/public/'.$this->document_url;
    }
}
