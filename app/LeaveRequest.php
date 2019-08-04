<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeaveRequest extends Model
{
    protected $guarded = [];
    
    public function leave_type()
    {
        return $this->belongsTo('App\LeaveType');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public static function staffs_on_leave(){
    	$active_leaves = \App\LeaveRequest::
            where('approval_status', 1)
            ->where('start_date', '<=', date_create('now'))
            ->where('end_date', '>=', date_create('now'))
            ->get();

          return $active_leaves;
    }

    public function getDocumentAttribute()
    {
        return 'app/public/'.$this->support_doc_url;
    }
}
