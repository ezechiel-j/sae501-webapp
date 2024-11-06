<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $primaryKey = 'animal_id';
    
    protected $fillable = [
        'animal_common_name',
        'animal_scientific_name',
        'animal_description'
    ];

    public function hikes()
    {
        return $this->belongsToMany(Hike::class, 'hike_hosted_animals', 'animal_id', 'hike_id');
    }

    public function discoveries()
    {
        return $this->hasMany(AnimalDiscovery::class, 'animal_id');
    }
}