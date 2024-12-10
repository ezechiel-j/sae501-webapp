<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PlantDiscoveryController;
use App\Http\Controllers\AnimalDiscoveryController;
use App\Http\Controllers\HikingController;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\HikeHostedAnimalController;
use App\Http\Controllers\HikeHostedPlantController;

Route::get('/hikes/hosted-animals', [HikeHostedAnimalController::class, 'getAnimalsByHike']);
Route::get('/hikes/hosted-plants', [HikeHostedPlantController::class, 'getPlantsByHike']);


Route::get('/hikes', [App\Http\Controllers\HikeController::class, 'getAllHikes']);
Route::get('/hikes/{id}', [App\Http\Controllers\HikeController::class, 'getOneHike']);
Route::get('/animals', [App\Http\Controllers\AnimalController::class, 'getAllAnimals']);
Route::get('/animals/{id}', [App\Http\Controllers\AnimalController::class, 'getOneAnimal']);
Route::get('/plants', [App\Http\Controllers\PlantController::class, 'getAllPlants']);
Route::get('/plants/{id}', [App\Http\Controllers\PlantController::class, 'getOnePlant']);

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('throttle:5,1')->group(function () {
  Route::post('/login', [AuthController::class, 'login']);
});

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::get('/me', [AuthController::class, 'me']);
  Route::post('/reset-password', [AuthController::class, 'resetPassword']);
  Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
  // Plants routes
  Route::post('/plants/discover', [PlantDiscoveryController::class, 'discover']);
  Route::delete('/plants/discover', [PlantDiscoveryController::class, 'removeDiscovery']);
  Route::patch('/plants/discover/favorite', [PlantDiscoveryController::class, 'toggleFavorite']);
  Route::get('plant-discoveries/stats', [PlantDiscoveryController::class, 'getDiscoveryStats']);
  Route::get('plant-discoveries/all', [PlantDiscoveryController::class, 'getAllDiscoveries']);
  Route::get('/plants/discovery-stats/detailed', [PlantDiscoveryController::class, 'getDetailedDiscoveryStats']);
  // Animals routes
  Route::post('/animals/discover', [AnimalDiscoveryController::class, 'discover']);
  Route::delete('/animals/discover', [AnimalDiscoveryController::class, 'removeDiscovery']);
  Route::patch('/animals/discover/favorite', [AnimalDiscoveryController::class, 'toggleFavorite']);
  Route::get('animal-discoveries/stats', [AnimalDiscoveryController::class, 'getDiscoveryStats']);
  Route::get('animal-discoveries/all', [AnimalDiscoveryController::class, 'getAllDiscoveries']);
  Route::get('/animals/discovery-stats/detailed', [AnimalDiscoveryController::class, 'getDetailedDiscoveryStats']);
  // Hiking routes
  Route::post('/hiking/start', [HikingController::class, 'startHiking']);
  Route::post('/hiking/end', [HikingController::class, 'endHiking']);
  Route::get('/hiking/current', [HikingController::class, 'getCurrentHiking']);
  Route::get('/hiking/stats', [HikingController::class, 'getHikingStats']);
  Route::patch('hikes/toggle-favorite', [HikeController::class, 'toggleFavorite']);
});