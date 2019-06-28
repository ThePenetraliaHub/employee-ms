<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Department::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        factory(\App\Department::class, 4)->create();
    }
}
