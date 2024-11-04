<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/hikes', [App\Http\Controllers\HikeController::class, 'getAllHikes']);
Route::get('/hikes/{id}', [App\Http\Controllers\HikeController::class, 'getOneHike']);
