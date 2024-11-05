<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HikeHostedAnimalsTableSeeder extends Seeder
{
    public function run()
    {
        // For each hike, add 3 animals
        $hikeHostedAnimals = [];
        for ($hikeId = 1; $hikeId <= 3; $hikeId++) {
            for ($animalId = 1; $animalId <= 3; $animalId++) {
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