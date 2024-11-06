<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalsFamilyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('animals_family')->insert([
            [
                'animal_family_id' => 1,
                'animal_family_name' => 'Sciuridae',
                'animal_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 2,
                'animal_family_name' => 'Bovidae',
                'animal_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 3,
                'animal_family_name' => 'Accipitridae',
                'animal_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}