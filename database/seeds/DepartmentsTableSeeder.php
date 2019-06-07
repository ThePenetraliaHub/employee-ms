<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $query =  " INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ICT', '2019-06-04 14:50:45', '2019-06-04 14:50:45'),
(2, 'ADMIN', '2019-06-04 14:50:59', '2019-06-04 14:50:59'),
(3, 'Marketting', '2019-06-05 09:47:20', '2019-06-05 09:47:20')";

		DB::insert($query);
    }
}
