<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscoverPlantsTableSeeder extends Seeder
{
    public function run()
    {
        // Add some discovered plants for each user
        DB::table('discover_plants')->insert([
            [
                'user_id' => 1, // John Doe
                'plant_id' => 1, // Mountain Lavender
                'hike_id' => 1, // Mont Blanc Trail
                'discoverd_plant_favoured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'plant_id' => 2, // Alpine Edelweiss
                'hike_id' => 1,
                'discoverd_plant_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Jane Smith
                'plant_id' => 3, // Mountain Pine
                'hike_id' => 2, // Valley Loop
                'discoverd_plant_favoured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}