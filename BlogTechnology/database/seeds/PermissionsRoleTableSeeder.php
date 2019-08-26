<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\admin\Permission;
use App\Model\admin\role;
use App\Model\admin\Permission_role;

class PermissionsRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permission_roles')->truncate();

        for ($i = 0; $i < 20; $i++)
        {
            $values = [
                'role_id' => random_int(1,3),
                'permission_id' => random_int(1,15),
            ];
            Permission_role::create($values);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
