<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query =  "INSERT INTO `projects` (`id`, `client_id`, `name`, `details`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'API', 'Development of Application Programming Interface', '2019-06-04', '2019-06-25', 'Completed', '2019-06-04 16:46:20', '2019-06-05 10:29:23'),
(2, 2, 'EMS', 'Development of an employee management system', '2019-05-27', '2019-06-01', 'Initiated', '2019-06-04 17:30:56', '2019-06-05 10:27:59') ";

		DB::insert($query);
    }
}
