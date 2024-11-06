<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantDiscovery extends Model
{
    protected $table = 'discover_plants';
    protected $primaryKey = 'discover_plant_id';

    protected $fillable = [
        'user_id',
        'plant_id',
        'hike_id',
        'discoverd_plant_favoured'
    ];

    protected $casts = [
        'discoverd_plant_favoured' => 'boolean'
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }

    public function hike()
    {
        return $this->belongsTo(Hike::class, 'hike_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}