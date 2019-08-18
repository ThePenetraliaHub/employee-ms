<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SuperRole;
class Role extends SuperRole
{
    protected $guarded = [];

    public static function admin_roles(){
    	return Role::where('user_type', 'admin')->orderBy('id', 'desc')->get();
    }

    public static function employee_roles(){
    	return Role::where('user_type', 'employee')->orderBy('id', 'desc')->get();
    }
}
