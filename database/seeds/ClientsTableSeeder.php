<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Client::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        $faker = Faker::create();

        $client_ids = Client::pluck('id')->all();

        for($i = 0; $i < 10;  $i++){

            factory(\App\Client::class)->create();
        }
}
}
