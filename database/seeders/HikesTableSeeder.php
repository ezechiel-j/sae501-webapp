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
                'hike_name' => 'Le saut de la Bourrique',
                'hike_distance' => 8.6,
                'hike_average_duration' => 189, // 3.15 hours in minutes
                'hike_difficulty' => 'Moyen',
                'hike_start_point_return' => true,
                'hike_ascendant' => 277,
                'hike_descendant' => 278,
                'hike_top_point' => 894,
                'hike_bottom_point' => 660,
                'hike_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hike_name' => 'Les Deux Donon',
                'hike_distance' => 17.05,
                'hike_average_duration' => 423, // 7.05 hours in minutes
                'hike_difficulty' => 'Difficile',
                'hike_start_point_return' => true,
                'hike_ascendant' => 775,
                'hike_descendant' => 776,
                'hike_top_point' => 1007,
                'hike_bottom_point' => 409,
                'hike_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hike_name' => 'Le sentier des Roches',
                'hike_distance' => 9.96,
                'hike_average_duration' => 249, // 4.15 hours in minutes
                'hike_difficulty' => 'Difficile',
                'hike_start_point_return' => true,
                'hike_ascendant' => 494,
                'hike_descendant' => 495,
                'hike_top_point' => 1335,
                'hike_bottom_point' => 961,
                'hike_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hike_name' => 'Cascade de la Pissoire et Haut du Tot',
                'hike_distance' => 6.17,
                'hike_average_duration' => 129, // 2.15 hours in minutes
                'hike_difficulty' => 'Facile',
                'hike_start_point_return' => true,
                'hike_ascendant' => 174,
                'hike_descendant' => 169,
                'hike_top_point' => 862,
                'hike_bottom_point' => 723,
                'hike_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hike_name' => 'Le Petit Canada',
                'hike_distance' => 12.12,
                'hike_average_duration' => 240, // 4 hours in minutes
                'hike_difficulty' => 'Moyen',
                'hike_start_point_return' => true,
                'hike_ascendant' => 185,
                'hike_descendant' => 178,
                'hike_top_point' => 486,
                'hike_bottom_point' => 383,
                'hike_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hike_name' => 'Les rochers des Hirschsteine par les escaliers',
                'hike_distance' => 11.27,
                'hike_average_duration' => 270, // 4.5 hours in minutes
                'hike_difficulty' => 'Moyen',
                'hike_start_point_return' => true,
                'hike_ascendant' => 563,
                'hike_descendant' => 563,
                'hike_top_point' => 1293,
                'hike_bottom_point' => 1066,
                'hike_favoured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}