<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnvironmentalReading extends Model
{
    protected $fillable = [
        'location',
        'temperature',
        'humidity',
        'rainfall',
        'wind_speed',
        'aqi',
        'pm2_5',
        'pm10',
        'recorded_at',
    ];

    protected $casts = [
        'temperature' => 'float',
        'humidity' => 'float',
        'rainfall' => 'float',
        'wind_speed' => 'float',
        'aqi' => 'float',
        'pm2_5' => 'float',
        'pm10' => 'float',
        'recorded_at' => 'datetime',
    ];
}