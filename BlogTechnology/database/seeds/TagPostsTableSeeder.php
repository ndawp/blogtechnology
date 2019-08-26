<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\user\post;
use App\Mode\user\tag;
use App\Model\user\tag_post;

class TagPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('tag_posts')->truncate();

        for ($i = 0; $i < 20; $i++)
        {
            $values = [
                'post_id' => random_int(1,50),
                'tag_id' => random_int(1,5),
            ];
            tag_post::create($values);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
