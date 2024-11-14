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
                'animal_species_name' => 'Mammifère',
                'animal_family_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 2,
                'animal_species_name' => 'Mammifère',
                'animal_family_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 3,
                'animal_species_name' => 'Mammifère',
                'animal_family_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 4,
                'animal_species_name' => 'Mammifère',
                'animal_family_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 5,
                'animal_species_name' => 'Mammifère',
                'animal_family_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 6,
                'animal_species_name' => 'Mammifère',
                'animal_family_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 7,
                'animal_species_name' => 'Mammifère',
                'animal_family_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 8,
                'animal_species_name' => 'Oiseau',
                'animal_family_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 9,
                'animal_species_name' => 'Oiseau',
                'animal_family_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 10,
                'animal_species_name' => 'Oiseau',
                'animal_family_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 11,
                'animal_species_name' => 'Oiseau',
                'animal_family_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 12,
                'animal_species_name' => 'Oiseau',
                'animal_family_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 13,
                'animal_species_name' => 'Oiseau',
                'animal_family_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 14,
                'animal_species_name' => 'Oiseau',
                'animal_family_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 15,
                'animal_species_name' => 'Amphibien',
                'animal_family_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 16,
                'animal_species_name' => 'Amphibien',
                'animal_family_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 17,
                'animal_species_name' => 'Reptile',
                'animal_family_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 18,
                'animal_species_name' => 'Reptile',
                'animal_family_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 19,
                'animal_species_name' => 'Insecte',
                'animal_family_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 20,
                'animal_species_name' => 'Insecte',
                'animal_family_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 21,
                'animal_species_name' => 'Insecte',
                'animal_family_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 22,
                'animal_species_name' => 'Insecte',
                'animal_family_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 23,
                'animal_species_name' => 'Poisson',
                'animal_family_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_species_id' => 24,
                'animal_species_name' => 'Poisson',
                'animal_family_id' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}