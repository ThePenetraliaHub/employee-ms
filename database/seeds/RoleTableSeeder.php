<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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

        Role::create(['name' => 'super admin', 'display_name' => 'Super Administrator', 'user_type' => 'admin']);
        Role::create(['name' => 'employee', 'display_name' => 'Manager', 'user_type' => 'employee']);
    }
}
