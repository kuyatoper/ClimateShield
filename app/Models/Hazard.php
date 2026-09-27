<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hazard extends Model
{
    protected $fillable = [
    'title',
    'type',
    'description',
    'location',
    'latitude',
    'longitude',
    'severity',
    'status',
];
}