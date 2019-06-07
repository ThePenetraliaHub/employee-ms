<?php

use Illuminate\Database\Seeder;

class PayGradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query =  "INSERT INTO `pay_grades` (`id`, `title`, `currency`, `min_salary`, `max_salary`, `created_at`, `updated_at`) VALUES
(1, 'Grade 12', 'Naira', '300000', '500000', '2019-06-03 14:28:10', '2019-06-05 10:26:01'),
(3, 'Grade 8', 'Naira', '100000', '200000', '2019-06-03 14:34:34', '2019-06-05 10:25:28') ";

		DB::insert($query);
    }
}
