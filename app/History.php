<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\File;
use App\Employee;

class History extends Model
{
    //

	protected $guarded = [];
    protected $casts = [
        'issue_date' => 'datetime:Y-m-d',
        'returned_date' => 'datetime:Y-m-d',
    ];
    public function unitFrom()
    {
        return $this->belongsTo('App\Department', 'unit_from_id');
    }

    public function unitTo()
    {
        return $this->belongsTo('App\Department', 'unit_to_id');
    }

    public function sender()
    {
        return $this->belongsTo('App\Employee', 'sender_id');
    }

    public function reciever()
    {
        return $this->belongsTo('App\Employee', 'reciever_id');
    }

    public function collector()
    {
        return $this->belongsTo('App\Employee', 'collector_id');
    }

    public function file()
    {
        return $this->belongsTo('App\File', 'file_id');
    }
}
