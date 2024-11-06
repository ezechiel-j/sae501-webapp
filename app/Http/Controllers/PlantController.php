<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function getAllPlants()
    {
        $plants = Plant::all();
        return response()->json($plants);
    }

    public function getOnePlant($id)
    {
        $plant = Plant::findOrFail($id);
        return response()->json($plant);
    }
}