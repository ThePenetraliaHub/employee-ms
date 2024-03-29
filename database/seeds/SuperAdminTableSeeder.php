<?php

use Illuminate\Database\Seeder;
use App\SuperAdmin;
use App\User;

class SuperAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        SuperAdmin::truncate();
        User::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");


        $query = 'INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `avatar`, `password`, `typeable_id`, `typeable_type`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
					(1, "General Admin", "admin@penetraliahub.com", "2019-01-01 00:00:00", "avatars/default.png", "$2y$10$ycr2xzgSpXg4je9QIQuUluazxQ1ItOfIP6p0rrv.QwRgl4owqH0A2", 1, "App\\\SuperAdmin", 1, "9xFMtakcu6JUdVBlyr3lJ3xioplIBzIVbpH60xsmuTu2LxhP7PrvnwqzsxSy", "2019-01-01 00:00:00", "2019-04-23 11:28:19")';
    	DB::insert($query);

    	$query = "INSERT INTO `super_admins` (`id`, `phone`, `address`, `created_at`, `updated_at`) VALUES
					(1, '07061151982', '', '2019-01-01 00:00:00', '2019-01-01 00:00:00')";
    	DB::insert($query);

    	$query = 'INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
					(1, "App\\\User", 1)';
                    
    	DB::insert($query);
    }
}
