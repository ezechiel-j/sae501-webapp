<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/hikes', [App\Http\Controllers\HikeController::class, 'getAllHikes']);
Route::get('/hikes/{id}', [App\Http\Controllers\HikeController::class, 'getOneHike']);
Route::get('/animals', [App\Http\Controllers\AnimalController::class, 'getAllAnimals']);
Route::get('/animals/{id}', [App\Http\Controllers\AnimalController::class, 'getOneAnimal']);
Route::get('/plants', [App\Http\Controllers\PlantController::class, 'getAllPlants']);
Route::get('/plants/{id}', [App\Http\Controllers\PlantController::class, 'getOnePlant']);
