<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function getAllAnimals()
    {
        $animals = Animal::all();
        return response()->json($animals);
    }

    public function getOneAnimal($id)
    {
        $animal = Animal::findOrFail($id);
        return response()->json($animal);
    }
}