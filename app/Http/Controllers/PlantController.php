<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{
    //
    public function getAllPlants()
    {
        $plants = Plant::all();
        return response()->json($plants);
    }

    public function getOnePlant($id)
    {
        $plant = Plant::where('plant_id', $id)->firstOrFail();
        return response()->json($plant);
    }
}
