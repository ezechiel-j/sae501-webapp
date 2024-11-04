<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    //
    public function getAllAnimals()
    {
        $animals = Animal::all();
        return response()->json($animals);
    }

    public function getOneAnimal($id)
    {
        $animal = Animal::where('animal_id', $id)->firstOrfail();
        return response()->json($animal);
    }
}
