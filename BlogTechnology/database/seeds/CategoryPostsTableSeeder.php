<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\user\post;
use App\Mode\user\category;
use App\Model\user\category_post;

class CategoryPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('category_posts')->truncate();

        for ($i = 0; $i < 20; $i++)
        {
            $values = [
                'post_id' => random_int(1,50),
                'category_id' => random_int(1,20),
            ];
            category_post::create($values);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
