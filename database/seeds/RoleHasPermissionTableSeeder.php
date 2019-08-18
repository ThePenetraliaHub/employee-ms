<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Role::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $permissions = Permission::where('user_type', 'admin')->orWhere('user_type', 'all')->get();

        foreach($permissions as $permission){
            
        }
    }
}
