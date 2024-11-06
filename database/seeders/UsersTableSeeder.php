<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'first_name' => 'John',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'profile_picture' => 'john.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'first_name' => 'Jane',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'profile_picture' => 'jane.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}