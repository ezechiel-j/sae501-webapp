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
        $hike = Hike::findOrFail('hike_id', $id);
        return response()->json($hike);
    }
}
