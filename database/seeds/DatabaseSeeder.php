<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(SuperAdminPermissionTableSeeder::class);
        $this->call(SuperAdminTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(PayGradesTableSeeder::class);
        $this->call(JobTitlesTableSeeder::class);
        $this->call(EmployeeStatusesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
    }
}
