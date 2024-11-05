<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HikesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hikes')->insert([
            [
                'hike_id' => 1,
                'hike_name' => 'Mont Blanc Trail',
                'hike_distance' => 15000, // 15km
                'hike_average_duration' => 240, // 4 hours
                'hike_difficulty' => 'Difficile',
                'hike_start_point_return' => true,
                'hike_ascendant' => 800,
                'hike_descendant' => 800,
                'hike_top_point' => 2500,
                'hike_bottom_point' => 1700,
                'hike_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hike_id' => 2,
                'hike_name' => 'Valley Loop',
                'hike_distance' => 8000, // 8km
                'hike_average_duration' => 120, // 2 hours
                'hike_difficulty' => 'Facile',
                'hike_start_point_return' => true,
                'hike_ascendant' => 300,
                'hike_descendant' => 300,
                'hike_top_point' => 1200,
                'hike_bottom_point' => 900,
                'hike_favoured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hike_id' => 3,
                'hike_name' => 'Alpine Ridge',
                'hike_distance' => 12000, // 12km
                'hike_average_duration' => 180, // 3 hours
                'hike_difficulty' => 'Moyen',
                'hike_start_point_return' => false,
                'hike_ascendant' => 600,
                'hike_descendant' => 450,
                'hike_top_point' => 1800,
                'hike_bottom_point' => 1200,
                'hike_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}