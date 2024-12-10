<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;

class HikeHostedAnimalController extends Controller
{
    public function getAnimalsByHike()
    {
        $hikes = Hike::with('animals')
            ->get()
            ->map(function($hike) {
                return [
                    'hike_id' => $hike->hike_id,
                    'hike_name' => $hike->hike_name,
                    'animals' => $hike->animals->map(function($animal) {
                        return [
                            'animal_id' => $animal->animal_id,
                            'animal_common_name' => $animal->animal_common_name,
                            'animal_scientific_name' => $animal->animal_scientific_name,
                            'animal_description' => $animal->animal_description
                        ];
                    })
                ];
            });

        return response()->json([
            'hikes' => $hikes
        ]);
    }
}