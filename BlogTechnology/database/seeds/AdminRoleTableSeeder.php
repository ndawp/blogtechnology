<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\admin\admin;
use App\Mode\admin\role;
use App\Model\admin\admin_role;

class AdminRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('admin_roles')->truncate();

        for ($i = 0; $i < 10; $i++)
        {
            $values = [
                'admin_id' => random_int(1,10),
                'role_id' => random_int(1,12),
            ];
            admin_role::create($values);
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
