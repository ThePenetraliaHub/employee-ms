<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Employee;
use App\Department;
use App\Client;
use App\Project;
use App\Skill;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['ICT','MARKETING','ACCOUNTING','AUDITTING']),
    ];
});

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'NIN' => $faker->unique()->numberBetween(900000, 1000000),
        'employee_number' => "pen".$faker->unique()->numberBetween(5000, 7000),
        'name' => $faker->name,
        'date_of_birth' => $faker->dateTime($max = 'now', $timezone = null),
        'gender' => $faker->randomElement(['male', 'female']),
        'marital_status' => $faker->randomElement(['married', 'single']),
		'joined_date' => $faker->dateTime($max = 'now', $timezone = null),
        'addressline1' => $faker->address,
        'addressline2' => $faker->address,
        'zip_code' => $faker->postcode,
        'home_phone' => $faker->e164PhoneNumber,
        'office_phone' => $faker->e164PhoneNumber,
        'private_email' => $faker->unique()->safeEmail,
        'office_email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'details' => $faker->sentence,
        'address' => $faker->address,
        'contact_number' => $faker->e164PhoneNumber,
        'contact_email' => $faker->unique()->safeEmail,
        'status' => $faker->randomElement(['1','0'] ),
        'first_contact_date' => $faker->dateTime($max = 'now', $timezone = null),
        'company_url' => $faker->url,
        
    ];
});

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' =>'Development of '. $faker->domainName,
        'details' => $faker->sentence,
        'status' => $faker->randomElement(['Initiate','Completed','Pending','Terminated'] ),
        'start_date' => $faker->dateTime($max = 'now', $timezone = null),
        'end_date' => $faker->dateTime($max = 'now', $timezone = null),
        
    ];
});

$factory->define(Skill::class, function (Faker $faker) {
    return [
        'skill_title' => $faker->randomElement(['Analytical skills','Communication skills','Computer skills','Management skills','Marketing skills','Teamwork skills','Project management skills','Creative thinking skills'] ),
        'detail' => $faker->sentence,
    ];
});

           