<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HikingController extends Controller
{
    public function startHiking(Request $request)
    {
        $request->validate([
            'hike_id' => 'required|exists:hikes,hike_id',
        ]);

        // Check if user has an ongoing hiking session
        $ongoingHiking = DB::table('hiking')
            ->where('user_id', Auth::id())
            ->where('hiking_status', 'En cours')
            ->first();

        if ($ongoingHiking) {
            return response()->json([
                'message' => 'You already have an ongoing hiking session'
            ], 409);
        }

        // Store the exact start time
        $startTime = Carbon::now();

        // Start new hiking session
        DB::table('hiking')->insert([
            'hike_id' => $request->hike_id,
            'user_id' => Auth::id(),
            'hiking_start_date' => $startTime,
            'hiking_status' => 'En cours'
        ]);

        return response()->json([
            'message' => 'Hiking session started successfully',
            'start_time' => $startTime
        ], 201);
    }

    public function endHiking(Request $request)
    {
        $request->validate([
            'hike_id' => 'required|exists:hikes,hike_id',
        ]);

        // Get the current hiking session
        $currentHiking = DB::table('hiking')
            ->where('user_id', Auth::id())
            ->where('hike_id', $request->hike_id)
            ->where('hiking_status', 'En cours')
            ->first();

        if (!$currentHiking) {
            return response()->json([
                'message' => 'No ongoing hiking session found for this hike'
            ], 404);
        }

        // Get the current time for end_date
        $endTime = Carbon::now();

        // Update the hiking session
        $updated = DB::table('hiking')
            ->where('hiking_id', $currentHiking->hiking_id)
            ->update([
                'hiking_end_date' => $endTime,
                'hiking_status' => 'Terminé'
            ]);

        return response()->json([
            'message' => 'Hiking session ended successfully',
            'start_time' => $currentHiking->hiking_start_date,
            'end_time' => $endTime,
            'duration' => Carbon::parse($currentHiking->hiking_start_date)->diffForHumans($endTime, true)
        ]);
    }

    public function getCurrentHiking()
    {
        $hiking = DB::table('hiking')
            ->select('hiking.*', 'hikes.*')
            ->join('hikes', 'hiking.hike_id', '=', 'hikes.hike_id')
            ->where('hiking.user_id', Auth::id())
            ->where('hiking.hiking_status', 'En cours')
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
        $hikingHistory = DB::table('hiking')
            ->select('hiking.*', 'hikes.*')
            ->join('hikes', 'hiking.hike_id', '=', 'hikes.hike_id')
            ->where('hiking.user_id', Auth::id())
            ->orderBy('hiking.hiking_start_date', 'desc')
            ->get();

        return response()->json([
            'hiking_history' => $hikingHistory
        ]);
    }

    public function getHikingStats()
    {
        $stats = DB::table('hiking')
            ->where('user_id', Auth::id())
            ->select(
                DB::raw('COUNT(*) as total_hikes'),
                DB::raw('COUNT(CASE WHEN hiking_status = "Terminé" THEN 1 END) as completed_hikes'),
                DB::raw('COUNT(CASE WHEN hiking_status = "En cours" THEN 1 END) as ongoing_hikes')
            )
            ->first();

        return response()->json([
            'stats' => $stats
        ]);
    }
}