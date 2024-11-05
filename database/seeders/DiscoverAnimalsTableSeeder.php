<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscoverAnimalsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('discover_animals')->insert([
            [
                'user_id' => 1, // John Doe
                'animal_id' => 1, // Alpine Marmot
                'hike_id' => 1, // Mont Blanc Trail
                'discoverd_animal_favoured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Jane Smith
                'animal_id' => 2, // Chamois
                'hike_id' => 2, // Valley Loop
                'discoverd_animal_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}