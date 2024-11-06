<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HikeHostedPlantsTableSeeder extends Seeder
{
    public function run()
    {
        // For each hike, add 3 plants
        $hikeHostedPlants = [];
        for ($hikeId = 1; $hikeId <= 3; $hikeId++) {
            for ($plantId = 1; $plantId <= 3; $plantId++) {
                $hikeHostedPlants[] = [
                    'hike_id' => $hikeId,
                    'plant_id' => $plantId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        
        DB::table('hike_hosted_plants')->insert($hikeHostedPlants);
    }
}