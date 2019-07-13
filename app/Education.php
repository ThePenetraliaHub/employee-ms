<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $guarded = [];
	protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
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
