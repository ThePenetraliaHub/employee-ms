<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{

	protected $guarded = [];
	protected $casts = [
        'granted_on' => 'datetime',
        'valid_on' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function getDocumentAttribute()
    {
        return 'app/public/'.$this->document_url;
    }
}
