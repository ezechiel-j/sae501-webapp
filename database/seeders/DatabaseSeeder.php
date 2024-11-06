<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PlantsTableSeeder::class,
            PlantsFamilyTableSeeder::class,
            PlantsSpeciesTableSeeder::class,
            AnimalsTableSeeder::class,
            AnimalsFamilyTableSeeder::class,
            AnimalsSpeciesTableSeeder::class,
            HikesTableSeeder::class,
            HikeHostedPlantsTableSeeder::class,
            HikeHostedAnimalsTableSeeder::class,
            HikingTableSeeder::class,
            DiscoverPlantsTableSeeder::class,
            DiscoverAnimalsTableSeeder::class,
        ]);
    }
}