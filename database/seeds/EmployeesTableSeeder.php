<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $query =  "INSERT INTO `employees` (`id`, `supervisor_id`, `department_id`, `pay_grade_id`, `employee_status_id`, `job_title_id`, `NIN`, `employee_number`, `firstname`, `middlename`, `lastname`, `date_of_birth`, `gender`, `marital_status`, `joined_date`, `addressline1`, `addressline2`, `zip_code`, `home_phone`, `office_phone`, `private_email`, `office_email`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1, 1, '45363377', 'PEN41', 'Richard', 'Ariokwu', 'Odigiri', '2019-05-29', 'Male', 'Single', '2019-06-05', 'Abuja', 'Asokoro', '90000001', '08062951962', '08062951963', 'richysleek@gmail.com', 'orichard@penetraliahub.com', '2019-06-05 09:52:53', '2019-06-05 09:55:12'),
(2, 1, 2, 1, 2, 3, '67532', 'PEN40', 'Jacop', 'Olu', 'Gbenga', '1984-05-26', 'Male', 'Married', '2017-05-16', '25, Gombe Street Area 8', 'Abuja Nigeria', '9000001', '08074639263', '08074839474', 'gbengaolu@yahoo.com', 'golu@penetraliahub.com', '2019-06-05 10:34:34', '2019-06-05 10:34:34') ,
(3, 2, 3, 3, 1, 2, '84632', 'PEN46', 'Daniel', 'Ochotukpo', 'Odeh', '1967-12-12', 'Male', 'Married', '2019-02-13', 'Kurudu Baracks Face 2', 'Abuja', '900001', '09083627364', '09083627364', 'odeh@gmail.com', 'odaniel@penetraliahub.com', '2019-06-05 11:29:27', '2019-06-05 11:29:27')";

		DB::insert($query);
    }
}
