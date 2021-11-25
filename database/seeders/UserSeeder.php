<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin'),
                'profile'=>'default.jpg',
                'type'=>'0',
                'phone'=>'09799898542',
                'address'=>'Sanchaung Tsp',
                'dob'=>'1992/03/20',
                'create_user_id'=>'1',
                'updated_user_id'=>'1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('user'),
                'profile'=>'default.jpg',
                'type'=>'1',
                'phone'=>'09978405103',
                'address'=>'Sanchaung Tsp',
                'dob'=>'1992/03/20',
                'create_user_id'=>'1',
                'updated_user_id'=>'1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
