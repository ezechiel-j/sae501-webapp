<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalDiscovery;
use App\Models\Hike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnimalDiscoveryController extends Controller
{
    public function discover(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,animal_id',
            'hike_id' => 'required|exists:hikes,hike_id',
            'is_favoured' => 'required|boolean'
        ]);

        $hike = Hike::findOrFail($request->hike_id);
        
        // Check if animal exists in this hike using proper table references
        $animalInHike = $hike->animals()
            ->where('animals.animal_id', $request->animal_id)
            ->exists();
        
        if (!$animalInHike) {
            return response()->json([
                'message' => 'This animal is not available in this hike'
            ], 404);
        }

        // Check if already discovered
        $alreadyDiscovered = AnimalDiscovery::where('user_id', Auth::id())
            ->where('animal_id', $request->animal_id)
            ->where('hike_id', $request->hike_id)
            ->exists();

        if ($alreadyDiscovered) {
            return response()->json([
                'message' => 'Animal already discovered in this hike'
            ], 409);
        }

        // Add discovery
        AnimalDiscovery::create([
            'user_id' => Auth::id(),
            'animal_id' => $request->animal_id,
            'hike_id' => $request->hike_id,
            'discoverd_animal_favoured' => $request->is_favoured
        ]);

        return response()->json([
            'message' => 'Animal discovered successfully'
        ], 201);
    }

    public function removeDiscovery(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,animal_id',
            'hike_id' => 'required|exists:hikes,hike_id',
        ]);

        $deleted = AnimalDiscovery::where('user_id', Auth::id())
            ->where('animal_id', $request->animal_id)
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
            'animal_id' => 'required|exists:animals,animal_id',
            'hike_id' => 'required|exists:hikes,hike_id',
        ]);

        $discovery = AnimalDiscovery::where([
            'user_id' => Auth::id(),
            'animal_id' => $request->animal_id,
            'hike_id' => $request->hike_id
        ])->first();

        if (!$discovery) {
            return response()->json([
                'message' => 'Discovery not found'
            ], 404);
        }

        $discovery->discoverd_animal_favoured = !$discovery->discoverd_animal_favoured;
        $discovery->save();

        return response()->json([
            'message' => 'Favorite status toggled successfully',
            'is_favoured' => $discovery->discoverd_animal_favoured
        ]);
    }

    public function getDiscoveryStats(Request $request)
    {
        // Get total discoverable animals across all hikes
        $totalDiscoverableAnimals = DB::table('hike_hosted_animals')
            ->select('animal_id')
            ->distinct()
            ->count();

        // Get total discovered animals by the current user
        $discoveredAnimals = AnimalDiscovery::where('user_id', Auth::id())
            ->select('animal_id')
            ->distinct()
            ->count();

        return response()->json([
            'total_discoverable' => $totalDiscoverableAnimals,
            'total_discovered' => $discoveredAnimals,
            'discovery_percentage' => $totalDiscoverableAnimals > 0 
                ? round(($discoveredAnimals / $totalDiscoverableAnimals) * 100, 2) 
                : 0
        ]);
    }

    public function getDetailedDiscoveryStats(Request $request)
    {
        $hikesStats = Hike::select('hikes.hike_id', 'hikes.hike_name')
            ->selectRaw('COUNT(DISTINCT hha.animal_id) as total_animals')
            ->selectRaw('COUNT(DISTINCT da.animal_id) as discovered_animals')
            ->leftJoin('hike_hosted_animals as hha', 'hikes.hike_id', '=', 'hha.hike_id')
            ->leftJoin('discover_animals as da', function($join) {
                $join->on('hikes.hike_id', '=', 'da.hike_id')
                    ->where('da.user_id', '=', Auth::id());
            })
            ->groupBy('hikes.hike_id', 'hikes.hike_name')
            ->get()
            ->map(function($hike) {
                return [
                    'hike_id' => $hike->hike_id,
                    'hike_name' => $hike->hike_name,
                    'total_animals' => $hike->total_animals,
                    'discovered_animals' => $hike->discovered_animals,
                    'discovery_percentage' => $hike->total_animals > 0 
                        ? round(($hike->discovered_animals / $hike->total_animals) * 100, 2) 
                        : 0
                ];
            });

        return response()->json([
            'hikes' => $hikesStats
        ]);
    }

    public function getAllDiscoveries()
    {
        $discoveries = AnimalDiscovery::with(['animal', 'hike'])
            ->where('user_id', Auth::id())
            ->get()
            ->map(function($discovery) {
                return [
                    'animal_id' => $discovery->animal_id,
                    'animal_name' => $discovery->animal->animal_common_name,
                    'hike_id' => $discovery->hike_id,
                    'hike_name' => $discovery->hike->hike_name,
                    'is_favoured' => $discovery->discoverd_animal_favoured,
                    'discovered_at' => $discovery->created_at
                ];
            });

        return response()->json([
            'discoveries' => $discoveries
        ]);
    }
}