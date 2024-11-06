<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\PlantDiscovery;
use App\Models\Hike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlantDiscoveryController extends Controller
{
    public function discover(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,plant_id',
            'hike_id' => 'required|exists:hikes,hike_id',
            'is_favoured' => 'required|boolean'
        ]);

        $hike = Hike::findOrFail($request->hike_id);
        
        // Check if plant exists in this hike using proper table references
        $plantInHike = $hike->plants()
            ->where('plants.plant_id', $request->plant_id)
            ->exists();
        
        if (!$plantInHike) {
            return response()->json([
                'message' => 'This plant is not available in this hike'
            ], 404);
        }

        // Check if already discovered
        $alreadyDiscovered = PlantDiscovery::where('user_id', Auth::id())
            ->where('plant_id', $request->plant_id)
            ->where('hike_id', $request->hike_id)
            ->exists();

        if ($alreadyDiscovered) {
            return response()->json([
                'message' => 'Plant already discovered in this hike'
            ], 409);
        }

        // Add discovery
        PlantDiscovery::create([
            'user_id' => Auth::id(),
            'plant_id' => $request->plant_id,
            'hike_id' => $request->hike_id,
            'discoverd_plant_favoured' => $request->is_favoured
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

        $deleted = PlantDiscovery::where('user_id', Auth::id())
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

        $discovery = PlantDiscovery::where([
            'user_id' => Auth::id(),
            'plant_id' => $request->plant_id,
            'hike_id' => $request->hike_id
        ])->first();

        if (!$discovery) {
            return response()->json([
                'message' => 'Discovery not found'
            ], 404);
        }

        $discovery->discoverd_plant_favoured = !$discovery->discoverd_plant_favoured;
        $discovery->save();

        return response()->json([
            'message' => 'Favorite status toggled successfully',
            'is_favoured' => $discovery->discoverd_plant_favoured
        ]);
    }

    public function getDiscoveryStats(Request $request)
    {
        // Get total discoverable plants across all hikes using the pivot table
        $totalDiscoverablePlants = DB::table('hike_hosted_plants')
            ->select('plant_id')
            ->distinct()
            ->count();

        // Get total discovered plants by the current user
        $discoveredPlants = PlantDiscovery::where('user_id', Auth::id())
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
        $hikesStats = Hike::select('hikes.hike_id', 'hikes.hike_name')
            ->selectRaw('COUNT(DISTINCT hhp.plant_id) as total_plants')
            ->selectRaw('COUNT(DISTINCT dp.plant_id) as discovered_plants')
            ->leftJoin('hike_hosted_plants as hhp', 'hikes.hike_id', '=', 'hhp.hike_id')
            ->leftJoin('discover_plants as dp', function($join) {
                $join->on('hikes.hike_id', '=', 'dp.hike_id')
                    ->where('dp.user_id', '=', Auth::id());
            })
            ->groupBy('hikes.hike_id', 'hikes.hike_name')
            ->get()
            ->map(function($hike) {
                return [
                    'hike_id' => $hike->hike_id,
                    'hike_name' => $hike->hike_name,
                    'total_plants' => $hike->total_plants,
                    'discovered_plants' => $hike->discovered_plants,
                    'discovery_percentage' => $hike->total_plants > 0 
                        ? round(($hike->discovered_plants / $hike->total_plants) * 100, 2) 
                        : 0
                ];
            });

        return response()->json([
            'hikes' => $hikesStats
        ]);
    }

    public function getAllDiscoveries()
    {
        $discoveries = PlantDiscovery::with(['plant', 'hike'])
            ->where('user_id', Auth::id())
            ->get()
            ->map(function($discovery) {
                return [
                    'plant_id' => $discovery->plant_id,
                    'plant_name' => $discovery->plant->plant_common_name,
                    'hike_id' => $discovery->hike_id,
                    'hike_name' => $discovery->hike->hike_name,
                    'is_favoured' => $discovery->discoverd_plant_favoured,
                    'discovered_at' => $discovery->created_at
                ];
            });

        return response()->json([
            'discoveries' => $discoveries
        ]);
    }
}