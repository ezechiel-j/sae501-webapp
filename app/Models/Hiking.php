<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hiking extends Model
{
    protected $table = 'hiking';
    protected $primaryKey = 'hiking_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'hike_id',
        'hiking_start_date',
        'hiking_end_date',
        'hiking_status'
    ];

    protected $casts = [
        'hiking_start_date' => 'datetime',
        'hiking_end_date' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hike()
    {
        return $this->belongsTo(Hike::class, 'hike_id');
    }
}