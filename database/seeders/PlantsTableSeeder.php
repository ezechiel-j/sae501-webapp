<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('plants')->insert([
            [
                'plant_id' => 1,
                'plant_common_name' => 'Mountain Lavender',
                'plant_scientific_name' => 'Lavandula montana',
                'plant_description' => 'A beautiful purple flowering plant found in mountainous regions',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plant_id' => 2,
                'plant_common_name' => 'Alpine Edelweiss',
                'plant_scientific_name' => 'Leontopodium alpinum',
                'plant_description' => 'Iconic white mountain flower',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plant_id' => 3,
                'plant_common_name' => 'Mountain Pine',
                'plant_scientific_name' => 'Pinus mugo',
                'plant_description' => 'Small pine species adapted to high altitudes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plant_id' => 4,
                'plant_common_name' => 'Alpine Rose',
                'plant_scientific_name' => 'Rhododendron ferrugineum',
                'plant_description' => 'Pink flowering shrub common in alpine regions',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}