<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('animals')->insert([
            [
                'animal_id' => 1,
                'animal_common_name' => 'Alpine Marmot',
                'animal_scientific_name' => 'Marmota marmota',
                'animal_description' => 'Large ground squirrel that lives in mountainous areas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 2,
                'animal_common_name' => 'Chamois',
                'animal_scientific_name' => 'Rupicapra rupicapra',
                'animal_description' => 'Goat-antelope species native to mountains',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 3,
                'animal_common_name' => 'Golden Eagle',
                'animal_scientific_name' => 'Aquila chrysaetos',
                'animal_description' => 'Large bird of prey found in mountainous regions',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'animal_id' => 4,
                'animal_common_name' => 'Alpine Ibex',
                'animal_scientific_name' => 'Capra ibex',
                'animal_description' => 'Wild goat species that lives in the Alps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}