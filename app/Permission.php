<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SuperPermission;

class Permission extends SuperPermission
{
	public static function grouped_permissions(){
		return Permission::all()->groupBy('table_name');
	}
}
