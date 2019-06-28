<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Employee;
use App\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Skill::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $faker = Faker::create();

        $employee_ids = Employee::pluck('id')->all();

        for($i = 0; $i < 20;  $i++){

        factory(\App\Skill::class)->create(
        [
         'employee_id'=> $faker->randomElement($employee_ids),

        ]);
        }

    }
}
