<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $primaryKey = 'plant_id';
    
    protected $fillable = [
        'plant_common_name',
        'plant_scientific_name',
        'plant_description'
    ];

    public function hikes()
    {
        return $this->belongsToMany(Hike::class, 'hike_hosted_plants', 'plant_id', 'hike_id');
    }

    public function discoveries()
    {
        return $this->hasMany(PlantDiscovery::class, 'plant_id');
    }
}