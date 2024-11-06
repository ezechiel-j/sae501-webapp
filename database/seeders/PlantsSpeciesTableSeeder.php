<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantsSpeciesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('plants_species')->insert([
            [
                'plant_species_id' => 1,
                'plant_species_name' => 'Mountain Lavender Species',
                'plant_family_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plant_species_id' => 2,
                'plant_species_name' => 'Alpine Edelweiss Species',
                'plant_family_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plant_species_id' => 3,
                'plant_species_name' => 'Mountain Pine Species',
                'plant_family_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}