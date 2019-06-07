<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$query =  "INSERT INTO `clients` (`id`, `name`, `details`, `address`, `contact_number`, `contact_email`, `company_url`, `status`, `first_contact_date`, `created_at`, `updated_at`) VALUES
		(1, 'JTB', 'Joint Task Board', 'Main one street, wuse zone 4- Abuja', '07073625387', 'jtb@gmail.com', 'www.jtb.com', '1', '2019-05-01', '2019-06-04 16:20:19', '2019-06-05 10:20:22'),
		(2, 'REA', 'rural electricity agency', 'Ademola Adetokunbo wuse 2, Abuja', '08057289462', 'rea@gmail.com', 'www.rea.com', '1', '2019-04-10', '2019-06-05 10:17:21', '2019-06-05 10:17:21')";

		DB::insert($query);
    }
}
