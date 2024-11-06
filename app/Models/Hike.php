<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    protected $primaryKey = 'hike_id';
    
    protected $fillable = [
        'hike_name',
        'hike_distance',
        'hike_average_duration',
        'hike_difficulty',
        'hike_start_point_return',
        'hike_ascendant',
        'hike_descendant',
        'hike_top_point',
        'hike_bottom_point',
        'hike_favoured'
    ];

    protected $casts = [
        'hike_start_point_return' => 'boolean',
        'hike_favoured' => 'boolean'
    ];

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'hike_hosted_animals', 'hike_id', 'animal_id');
    }

    public function plants()
    {
        return $this->belongsToMany(Plant::class, 'hike_hosted_plants', 'hike_id', 'plant_id');
    }

    public function hikingSessions()
    {
        return $this->hasMany(Hiking::class, 'hike_id');
    }
}