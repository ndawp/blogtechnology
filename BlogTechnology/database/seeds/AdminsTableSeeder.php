<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\admin\admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('admins')->truncate();

        for ($i = 0; $i < 10; $i++)
        {
            $faker = Factory::create('en_US');
            $values = [
                'name' => $faker->userName,
                'email' => $faker->freeEmail,
                'password' => bcrypt($faker->password),
                'phone' => $faker->phoneNumber,
                'status' => random_int(0,1)
            ];
            admin::create($values);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
