<?php

use Illuminate\Database\Seeder;

class EmployeeStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query =  "INSERT INTO `employee_statuses` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Permanent Staff', 'In-house staff', '2019-06-04 14:52:31', '2019-06-05 10:27:01'),
(2, 'Contract Staff', 'On contract base', '2019-06-05 09:57:41', '2019-06-05 09:57:41')";

		DB::insert($query);
    }
}
