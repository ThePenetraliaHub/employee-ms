<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeProject extends Pivot
{
	protected $guarded = [];
    protected $with = ['employee', 'project'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function getDocumentAttribute()
    {
        return 'app/public/'.$this->document_url;
    }
}
