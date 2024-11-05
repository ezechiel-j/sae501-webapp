<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PlantDiscoveryController extends Controller
{
    public function discover(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,plant_id',
            'hike_id' => 'required|exists:hikes,hike_id',
            'is_favoured' => 'required|boolean'
        ]);

        // Check if plant exists in this hike
        $plantInHike = DB::table('hike_hosted_plants')
            ->where('hike_id', $request->hike_id)
            ->where('plant_id', $request->plant_id)
            ->exists();

        if (!$plantInHike) {
            return response()->json([
                'message' => 'This plant is not available in this hike'
            ], 404);
        }

        // Check if already discovered
        $alreadyDiscovered = DB::table('discover_plants')
            ->where('user_id', Auth::id())
            ->where('plant_id', $request->plant_id)
            ->where('hike_id', $request->hike_id)
            ->exists();

        if ($alreadyDiscovered) {
            return response()->json([
                'message' => 'Plant already discovered in this hike'
            ], 409);
        }

        // Add discovery
        DB::table('discover_plants')->insert([
            'user_id' => Auth::id(),
            'plant_id' => $request->plant_id,
            'hike_id' => $request->hike_id,
            'discoverd_plant_favoured' => $request->is_favoured,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Plant discovered successfully'
        ], 201);
    }

    public function removeDiscovery(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,plant_id',
            'hike_id' => 'required|exists:hikes,hike_id',
        ]);

        $deleted = DB::table('discover_plants')
            ->where('user_id', Auth::id())
            ->where('plant_id', $request->plant_id)
            ->where('hike_id', $request->hike_id)
            ->delete();

        if (!$deleted) {
            return response()->json([
                'message' => 'Discovery not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Discovery removed successfully'
        ]);
    }

    public function toggleFavorite(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,plant_id',
            'hike_id' => 'required|exists:hikes,hike_id',
        ]);

        $discovery = DB::table('discover_plants')
            ->where('user_id', Auth::id())
            ->where('plant_id', $request->plant_id)
            ->where('hike_id', $request->hike_id);

        if (!$discovery->exists()) {
            return response()->json([
                'message' => 'Discovery not found'
            ], 404);
        }

        $discovery->update([
            'discoverd_plant_favoured' => !$discovery->first()->discoverd_plant_favoured,
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Favorite status toggled successfully'
        ]);
    }

    public function getDiscoveryStats(Request $request)
    {
        $userId = $request->user()->id;

        // Get total discoverable plants (from hike_hosted_plants)
        $totalDiscoverablePlants = DB::table('hike_hosted_plants')
            ->select('plant_id')
            ->distinct()
            ->count();

        // Get total discovered plants by the user
        $discoveredPlants = DB::table('discover_plants')
            ->where('user_id', $userId)
            ->select('plant_id')
            ->distinct()
            ->count();

        return response()->json([
            'total_discoverable' => $totalDiscoverablePlants,
            'total_discovered' => $discoveredPlants,
            'discovery_percentage' => $totalDiscoverablePlants > 0 
                ? round(($discoveredPlants / $totalDiscoverablePlants) * 100, 2) 
                : 0
        ]);
    }

    public function getDetailedDiscoveryStats(Request $request)
    {
        $userId = $request->user()->id;

        // Get all hikes with their plants
        $hikesStats = DB::table('hikes')
            ->select(
                'hikes.hike_id',
                'hikes.hike_name',
                DB::raw('COUNT(DISTINCT hhp.plant_id) as total_plants'),
                DB::raw('COUNT(DISTINCT dp.plant_id) as discovered_plants')
            )
            ->leftJoin('hike_hosted_plants as hhp', 'hikes.hike_id', '=', 'hhp.hike_id')
            ->leftJoin('discover_plants as dp', function($join) use ($userId) {
                $join->on('hikes.hike_id', '=', 'dp.hike_id')
                    ->where('dp.user_id', '=', $userId);
            })
            ->groupBy('hikes.hike_id', 'hikes.hike_name')
            ->get();

        return response()->json([
            'hikes' => $hikesStats->map(function($hike) {
                return [
                    'hike_id' => $hike->hike_id,
                    'hike_name' => $hike->hike_name,
                    'total_plants' => $hike->total_plants,
                    'discovered_plants' => $hike->discovered_plants,
                    'discovery_percentage' => $hike->total_plants > 0 
                        ? round(($hike->discovered_plants / $hike->total_plants) * 100, 2) 
                        : 0
                ];
            })
        ]);
    }
}