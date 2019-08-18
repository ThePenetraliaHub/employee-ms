<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Permission::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        //Administrator permissions
        Permission::create(['name' => '', 'guard_name' => 'web', 'display_name' => '', 'table_name'=> 'administrator', 'user_type' => '']);
        Permission::create(['name' => '', 'guard_name' => 'web', 'display_name' => '', 'table_name'=> 'administrator', 'user_type' => '']);
        Permission::create(['name' => '', 'guard_name' => 'web', 'display_name' => '', 'table_name'=> 'administrator', 'user_type' => '']);
        Permission::create(['name' => '', 'guard_name' => 'web', 'display_name' => '', 'table_name'=> 'administrator', 'user_type' => '']);
        Permission::create(['name' => '', 'guard_name' => 'web', 'display_name' => '', 'table_name'=> 'administrator', 'user_type' => '']);

    }
}
