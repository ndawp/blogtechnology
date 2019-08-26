<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Model\admin\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('permissions')->truncate();
        $forPost = 'Post';
        $forUser = 'User';
        $forOther = 'Other';
        $tag = 'Tag';
        $category = 'Category';
        
            $values = [
                'for' => $forPost,
                'name' => $forPost.'_Create',
            ];
            permission::create($values);
            $values = [
                'for' => $forPost,
                'name' => $forPost.'_Edit',
            ];
            permission::create($values);
            $values = [
                'for' => $forPost,
                'name' => $forPost.'_Delete',
            ];
            permission::create($values);
            $values = [
                'for' => $forPost,
                'name' => $forPost.'_Publish',
            ];
            permission::create($values);
            $values = [
                'for' => $forUser,
                'name' => $forUser.'_Create',
            ];
            permission::create($values);
            $values = [
                'for' => $forUser,
                'name' => $forUser.'_Edit',
            ];
            permission::create($values);
            $values = [
                'for' => $forUser,
                'name' => $forUser.'_Delete',
            ];
            permission::create($values);
            $values = [
                'for' => $forOther,
                'name' => $tag.'_Create',
            ];
            permission::create($values);
            $values = [
                'for' => $forOther,
                'name' => $tag.'_Edit',
            ];
            permission::create($values);
            $values = [
                'for' => $forOther,
                'name' => $tag.'_Read',
            ];
            permission::create($values);
            $values = [
                'for' => $forOther,
                'name' => $tag.'_Delete',
            ];
            permission::create($values);
            $values = [
                'for' => $forOther,
                'name' => $category.'_Create',
            ];
            permission::create($values);
            $values = [
                'for' => $forOther,
                'name' => $category.'_Edit',
            ];
            permission::create($values);
            $values = [
                'for' => $forOther,
                'name' => $category.'_Read',
            ];
            permission::create($values);
            $values = [
                'for' => $forOther,
                'name' => $category.'_Delete',
            ];
            permission::create($values);
        
        

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
