<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\user\post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('posts')->truncate();
        
        for ($i = 0; $i < 50; $i++)
        {
            $faker = Factory::create('en_US');
            $postTitle = $faker->text($maxNbChars = 64);
            $values = [
                'title' => $postTitle,
                'subtitle' => $faker->text($maxNbChars = 50),
                'slug' => Str::slug($postTitle),
                'body' => $faker->text,
                'status' => random_int(0,1),
                'posted_by' => random_int(1,10),
                'image' => $faker->imageUrl,
                'view' => random_int(0,1000000),
                'like' => random_int(0,1000),
                'dislike' => random_int(0,10),
            ];
            post::create($values);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
