<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            // admin
            [
                'full_name' => 'admin101',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' =>  Hash::make('1111'),
                'role' => 'admin',
                'status' => 'active'
            ],
            // vender
            [
                'full_name' => 'seller',
                'username' => 'seller',
                'email' => 'seller@gmail.com',
                'password' =>  Hash::make('1111'),
                'role' => 'seller',
                'status' => 'active'
            ],
            // vender
            [
                'full_name' => 'user101',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' =>  Hash::make('1111'),
                'role' => 'user',
                'status' => 'active'
            ],
            
        ]);
      
    }
}
