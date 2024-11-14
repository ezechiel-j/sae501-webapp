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
                'animal_family_name' => 'Bovidae',
                'animal_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 2,
                'animal_family_name' => 'Cervidae',
                'animal_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 3,
                'animal_family_name' => 'Cervidae',
                'animal_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 4,
                'animal_family_name' => 'Suidae',
                'animal_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 5,
                'animal_family_name' => 'Canidae',
                'animal_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 6,
                'animal_family_name' => 'Felidae',
                'animal_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 7,
                'animal_family_name' => 'Mustelidae',
                'animal_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 8,
                'animal_family_name' => 'Phasianidae',
                'animal_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 9,
                'animal_family_name' => 'Accipitridae',
                'animal_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 10,
                'animal_family_name' => 'Falconidae',
                'animal_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 11,
                'animal_family_name' => 'Picidae',
                'animal_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 12,
                'animal_family_name' => 'Corvidae',
                'animal_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 13,
                'animal_family_name' => 'Paridae',
                'animal_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 14,
                'animal_family_name' => 'Strigidae',
                'animal_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 15,
                'animal_family_name' => 'Salamandridae',
                'animal_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 16,
                'animal_family_name' => 'Bufonidae',
                'animal_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 17,
                'animal_family_name' => 'Viperidae',
                'animal_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 18,
                'animal_family_name' => 'Lacertidae',
                'animal_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 19,
                'animal_family_name' => 'Pieridae',
                'animal_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 20,
                'animal_family_name' => 'Lucanidae',
                'animal_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 21,
                'animal_family_name' => 'Andrenidae',
                'animal_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 22,
                'animal_family_name' => 'Scarabaeidae',
                'animal_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 23,
                'animal_family_name' => 'Salmonidae',
                'animal_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_family_id' => 24,
                'animal_family_name' => 'Salmonidae',
                'animal_id' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}