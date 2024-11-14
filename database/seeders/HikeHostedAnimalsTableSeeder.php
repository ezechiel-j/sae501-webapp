<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HikeHostedAnimalsTableSeeder extends Seeder
{
    public function run()
    {
        $hikeHostedAnimals = [];
        
        // We have 6 hikes (referencing HikesTableSeeder)
        // And about 20 animals total
        // Let's assign 5-7 animals per hike randomly
        
        for ($hikeId = 1; $hikeId <= 6; $hikeId++) {
            // Random number of animals per hike (5-7)
            $numAnimals = rand(5, 7);
            
            // Get random animals for this hike
            $animalIds = range(1, 20);
            shuffle($animalIds);
            $selectedAnimals = array_slice($animalIds, 0, $numAnimals);
            
            foreach ($selectedAnimals as $animalId) {
                $hikeHostedAnimals[] = [
                    'hike_id' => $hikeId,
                    'animal_id' => $animalId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        
        DB::table('hike_hosted_animals')->insert($hikeHostedAnimals);
    }
}