<?php

namespace App\Http\Controllers;

use App\Models\Hiking;
use App\Models\Hike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HikingController extends Controller
{
    public function startHiking(Request $request)
    {
        $request->validate([
            'hike_id' => 'required|exists:hikes,hike_id',
        ]);

        $ongoingHiking = Hiking::where('user_id', Auth::id())
            ->where('hiking_status', 'En cours')
            ->first();

        if ($ongoingHiking) {
            return response()->json([
                'message' => 'You already have an ongoing hiking session'
            ], 409);
        }

        $hiking = Hiking::create([
            'hike_id' => $request->hike_id,
            'user_id' => Auth::id(),
            'hiking_start_date' => now(),
            'hiking_status' => 'En cours'
        ]);

        return response()->json([
            'message' => 'Hiking session started successfully',
            'hiking' => $hiking
        ], 201);
    }

    public function endHiking(Request $request)
    {
        $hiking = Hiking::where('user_id', Auth::id())
            ->where('hiking_status', 'En cours')
            ->first();

        if (!$hiking) {
            return response()->json([
                'message' => 'No ongoing hiking session found'
            ], 404);
        }

        $hiking->hiking_end_date = now();
        $hiking->hiking_status = 'Terminé';
        $hiking->save();

        return response()->json([
            'message' => 'Hiking session ended successfully',
            'hiking' => $hiking
        ]);
    }

    public function getCurrentHiking()
    {
        $hiking = Hiking::with('hike')
            ->where('user_id', Auth::id())
            ->where('hiking_status', 'En cours')
            ->first();

        if (!$hiking) {
            return response()->json([
                'message' => 'No ongoing hiking session'
            ], 404);
        }

        return response()->json([
            'hiking' => $hiking
        ]);
    }

    public function getHikingHistory()
    {
        $hikingHistory = Hiking::with('hike')
            ->where('user_id', Auth::id())
            ->orderBy('hiking_start_date', 'desc')
            ->get();

        return response()->json([
            'hiking_history' => $hikingHistory
        ]);
    }

    public function getHikingStats()
    {
        $stats = Hiking::where('user_id', Auth::id())
            ->selectRaw('
                COUNT(*) as total_hikes,
                COUNT(CASE WHEN hiking_status = "Terminé" THEN 1 END) as completed_hikes,
                COUNT(CASE WHEN hiking_status = "En cours" THEN 1 END) as ongoing_hikes,
                SUM(CASE 
                    WHEN hiking_status = "Terminé" AND hiking_end_date IS NOT NULL 
                    THEN TIMESTAMPDIFF(MINUTE, hiking_start_date, hiking_end_date) 
                    ELSE 0 
                END) as total_minutes
            ')
            ->first();

        $averageDuration = $stats->completed_hikes > 0 
            ? round($stats->total_minutes / $stats->completed_hikes) 
            : 0;

        return response()->json([
            'total_hikes' => $stats->total_hikes,
            'completed_hikes' => $stats->completed_hikes,
            'ongoing_hikes' => $stats->ongoing_hikes,
            'average_duration_minutes' => $averageDuration
        ]);
    }
}