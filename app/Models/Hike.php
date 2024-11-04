<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    use HasFactory;

    protected $fillable = [
        'hikes_id',
        'hikes_name',
        'hikes_distance',
        'hikes_average_duration',
        'hikes_difficulty',
        'hikes_start_return',
        'hikes_ascendant',
        'hikes_descendant',
        'hikes_top_point',
        'hikes_bottom_point',
        'hikes_favoured',
    ];
}
