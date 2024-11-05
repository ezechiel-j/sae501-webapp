<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalsSpeciesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('animals_species')->insert([
            [
                'animal_species_id' => 1,
                'animal_species_name' => 'Alpine Marmot Species',
                'animal_family_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 2,
                'animal_species_name' => 'Chamois Species',
                'animal_family_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 3,
                'animal_species_name' => 'Golden Eagle Species',
                'animal_family_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}