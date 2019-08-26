<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\user\tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('tags')->truncate();

        for ($i = 0; $i < 5; $i++)
        {
            $faker = Factory::create('en_US');
            $tagName = $faker->sentence($nbWords = 2, $variableNbWords = true);
            $values = [
                'name' => $tagName,
                'slug' => Str::slug($tagName),
            ];
            tag::create($values);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
