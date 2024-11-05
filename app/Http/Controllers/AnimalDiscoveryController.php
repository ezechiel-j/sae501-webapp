<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnimalDiscoveryController extends Controller
{
    public function discover(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,animal_id',
            'hike_id' => 'required|exists:hikes,hike_id',
            'is_favoured' => 'required|boolean'
        ]);

        // Check if animal exists in this hike
        $animalInHike = DB::table('hike_hosted_animals')
            ->where('hike_id', $request->hike_id)
            ->where('animal_id', $request->animal_id)
            ->exists();

        if (!$animalInHike) {
            return response()->json([
                'message' => 'This animal is not available in this hike'
            ], 404);
        }

        // Check if already discovered
        $alreadyDiscovered = DB::table('discover_animals')
            ->where('user_id', Auth::id())
            ->where('animal_id', $request->animal_id)
            ->where('hike_id', $request->hike_id)
            ->exists();

        if ($alreadyDiscovered) {
            return response()->json([
                'message' => 'Animal already discovered in this hike'
            ], 409);
        }

        // Add discovery
        DB::table('discover_animals')->insert([
            'user_id' => Auth::id(),
            'animal_id' => $request->animal_id,
            'hike_id' => $request->hike_id,
            'discoverd_animal_favoured' => $request->is_favoured,
            'created_at' => now(),
            'updated_at' => now(),
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

        $deleted = DB::table('discover_animals')
            ->where('user_id', Auth::id())
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

        $discovery = DB::table('discover_animals')
            ->where('user_id', Auth::id())
            ->where('animal_id', $request->animal_id)
            ->where('hike_id', $request->hike_id);

        if (!$discovery->exists()) {
            return response()->json([
                'message' => 'Discovery not found'
            ], 404);
        }

        $discovery->update([
            'discoverd_animal_favoured' => !$discovery->first()->discoverd_animal_favoured,
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Favorite status toggled successfully'
        ]);
    }

    public function getDiscoveryStats(Request $request)
    {
        $userId = $request->user()->id;

        // Get total discoverable animals
        $totalDiscoverableAnimals = DB::table('hike_hosted_animals')
            ->select('animal_id')
            ->distinct()
            ->count();

        // Get total discovered animals by the user
        $discoveredAnimals = DB::table('discover_animals')
            ->where('user_id', $userId)
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
        $userId = $request->user()->id;

        // Get all hikes with their animals
        $hikesStats = DB::table('hikes')
            ->select(
                'hikes.hike_id',
                'hikes.hike_name',
                DB::raw('COUNT(DISTINCT hha.animal_id) as total_animals'),
                DB::raw('COUNT(DISTINCT da.animal_id) as discovered_animals')
            )
            ->leftJoin('hike_hosted_animals as hha', 'hikes.hike_id', '=', 'hha.hike_id')
            ->leftJoin('discover_animals as da', function($join) use ($userId) {
                $join->on('hikes.hike_id', '=', 'da.hike_id')
                    ->where('da.user_id', '=', $userId);
            })
            ->groupBy('hikes.hike_id', 'hikes.hike_name')
            ->get();

        return response()->json([
            'hikes' => $hikesStats->map(function($hike) {
                return [
                    'hike_id' => $hike->hike_id,
                    'hike_name' => $hike->hike_name,
                    'total_animals' => $hike->total_animals,
                    'discovered_animals' => $hike->discovered_animals,
                    'discovery_percentage' => $hike->total_animals > 0 
                        ? round(($hike->discovered_animals / $hike->total_animals) * 100, 2) 
                        : 0
                ];
            })
        ]);
    }
}