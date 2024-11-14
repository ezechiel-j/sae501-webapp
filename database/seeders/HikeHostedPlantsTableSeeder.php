<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HikeHostedPlantsTableSeeder extends Seeder
{
    public function run()
    {
        $hikeHostedPlants = [];
        
        // We have 6 hikes (referencing HikesTableSeeder)
        // And 42 plants total
        // Let's assign 10-12 plants per hike randomly
        
        for ($hikeId = 1; $hikeId <= 6; $hikeId++) {
            // Random number of plants per hike (10-12)
            $numPlants = rand(10, 12);
            
            // Get random plants for this hike
            $plantIds = range(1, 42);
            shuffle($plantIds);
            $selectedPlants = array_slice($plantIds, 0, $numPlants);
            
            foreach ($selectedPlants as $plantId) {
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