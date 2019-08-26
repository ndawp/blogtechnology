<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\admin\role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();

        $values = [
            'name' => 'Editor'
        ];
        role::create($values);
        $values = [
            'name' => 'Publisher'
        ];
        role::create($values);
        $values = [
            'name' => 'Writer'
        ];
        role::create($values);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
