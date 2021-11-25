<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title'=>'Post01',
                'description'=>'Description01',
                'status'=>'1',
                'create_user_id'=>'1',
                'updated_user_id'=>'1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'=>'Post02',
                'description'=>'Description02',
                'status'=>'1',
                'create_user_id'=>'1',
                'updated_user_id'=>'1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title'=>'Post03',
                'description'=>'Description03',
                'status'=>'1',
                'create_user_id'=>'1',
                'updated_user_id'=>'1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
