<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantsFamilyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('plants_family')->insert([
            [
                'plant_family_id' => 1,
                'plants_family_name' => 'Lamiaceae',
                'plant_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plant_family_id' => 2,
                'plants_family_name' => 'Asteraceae',
                'plant_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plant_family_id' => 3,
                'plants_family_name' => 'Pinaceae',
                'plant_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}