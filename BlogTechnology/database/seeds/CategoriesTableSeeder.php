<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\user\category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();
        for ($i = 0; $i < 20; $i++)
        {
            $faker = Factory::create('en_US');
            $categoryName = $faker->streetName;
            $values = [
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
            ];
            category::create($values);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
