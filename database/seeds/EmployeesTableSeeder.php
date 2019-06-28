<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Employee;
use App\Department;
use App\PayGrade;
use App\JobTitle;
use App\EmployeeStatus;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Employee::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $faker = Faker::create();

        $supervisor_ids = Employee::pluck('id')->all();
        $department_ids = Department::pluck('id')->all();
        $pay_grade_ids = PayGrade::pluck('id')->all();
        $employee_status_ids = EmployeeStatus::pluck('id')->all();
        $job_title_ids = JobTitle::pluck('id')->all();

        if(count($supervisor_ids) < 1){
            $supervisor_ids = [1];
        }

        for($i = 0; $i < 10;  $i++){

            factory(\App\Employee::class)->create([
                'supervisor_id'=> $faker->randomElement($supervisor_ids),
                'department_id'=> $faker->randomElement($department_ids),
                'pay_grade_id'=> $faker->randomElement($pay_grade_ids),
                'employee_status_id'=> $faker->randomElement($employee_status_ids),
                'job_title_id'=> $faker->randomElement($job_title_ids),
            ]);

            $supervisor_ids = Employee::pluck('id')->all();
        }
    }
}
