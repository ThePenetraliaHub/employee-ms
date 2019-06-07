<?php

use Illuminate\Database\Seeder;

class JobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query =  "INSERT INTO `job_titles` (`id`, `code`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'DEV-84635-EM', 'Developer', 'Software designs', '2019-06-04 14:51:52', '2019-06-05 10:24:41'),
(2, 'MKT-84635-EM', 'Marketer', 'Sales of products', '2019-06-05 10:23:00', '2019-06-05 10:23:26'),
(3, 'ADM-84635-EM', 'Administrator', 'Over sees the organization\'s work flow', '2019-06-05 10:24:25', '2019-06-05 10:24:25')";

		DB::insert($query);
    }
}
