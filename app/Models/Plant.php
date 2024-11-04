<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id',
        'plant_common_name',
        'plant_scientific_name',
        'plant_description',
    ];
}
