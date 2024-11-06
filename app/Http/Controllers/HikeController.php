<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    public function getAllHikes()
    {
        $hikes = Hike::with(['animals', 'plants'])
            ->get()
            ->map(function($hike) {
                return [
                    'hike_id' => $hike->hike_id,
                    'hike_name' => $hike->hike_name,
                    'hike_distance' => $hike->hike_distance,
                    'hike_average_duration' => $hike->hike_average_duration,
                    'hike_difficulty' => $hike->hike_difficulty,
                    'hike_start_point_return' => $hike->hike_start_point_return,
                    'hike_ascendant' => $hike->hike_ascendant,
                    'hike_descendant' => $hike->hike_descendant,
                    'hike_top_point' => $hike->hike_top_point,
                    'hike_bottom_point' => $hike->hike_bottom_point,
                    'is_favoured' => $hike->hike_favoured,
                    'total_animals' => $hike->animals->count(),
                    'total_plants' => $hike->plants->count()
                ];
            });

        return response()->json([
            'hikes' => $hikes
        ]);
    }

    public function getOneHike($id)
    {
        $hike = Hike::findOrFail($id);
        return response()->json($hike);
    }

    public function toggleFavorite(Request $request)
    {
        $request->validate([
            'hike_id' => 'required|exists:hikes,hike_id',
        ]);

        $hike = Hike::where([
            'hike_id' => $request->hike_id
        ])->first();

        if (!$hike) {
            return response()->json([
                'message' => 'Hike not found'
            ], 404);
        }

        $hike->hike_favoured = !$hike->hike_favoured;
        $hike->save();

        return response()->json([
            'message' => 'Favorite status toggled successfully',
            'is_favoured' => $hike->hike_favoured
        ]);
    }
}