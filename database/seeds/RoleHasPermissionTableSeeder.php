<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        // DB::statement("SET FOREIGN_KEY_CHECKS=0");
        // Role::truncate();
        // DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $permissions = Permission::where('user_type', 'admin')->orWhere('user_type', 'all')->get();

        foreach($permissions as $permission){
            $query = 'INSERT INTO `role_has_permissions` (`role_id`, `permission_id`) VALUES
                    (1, '.$permission->id.')';
                    
            DB::insert($query);
        }
    }
}