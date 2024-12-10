<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;


class HikeHostedPlantController extends Controller
{
    public function getPlantsByHike()
    {
        $hikes = Hike::with('plants')
            ->get()
            ->map(function($hike) {
                return [
                    'hike_id' => $hike->hike_id,
                    'hike_name' => $hike->hike_name,
                    'plants' => $hike->plants->map(function($plant) {
                        return [
                            'plant_id' => $plant->plant_id,
                            'plant_common_name' => $plant->plant_common_name,
                            'plant_scientific_name' => $plant->plant_scientific_name,
                            'plant_description' => $plant->plant_description
                        ];
                    })
                ];
            });

        return response()->json([
            'hikes' => $hikes
        ]);
    }
}