<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;

class HikeController extends Controller
{
    //
    public function getAllHikes()
    {
        $hikes = Hike::all();
        return response()->json($hikes);
    }

    public function getOneHike($id)
    {
        $hike = Hike::where('hike_id', $id)->firstOrfail();
        return response()->json($hike);
    }
}
