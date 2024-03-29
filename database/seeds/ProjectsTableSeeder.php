<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Project;
use App\Client;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Project::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $faker = Faker::create();

        $client_ids = Client::pluck('id')->all();

        for($i = 0; $i < 20;  $i++){

        factory(\App\Project::class)->create(
        [
         'client_id'=> $faker->randomElement($client_ids),

        ]);
        }
    }
}
 