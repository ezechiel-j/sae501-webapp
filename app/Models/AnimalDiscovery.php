<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalDiscovery extends Model
{
    protected $table = 'discover_animals';
    protected $primaryKey = 'discover_animal_id';

    protected $fillable = [
        'user_id',
        'animal_id',
        'hike_id',
        'discoverd_animal_favoured'
    ];

    protected $casts = [
        'discoverd_animal_favoured' => 'boolean'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
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