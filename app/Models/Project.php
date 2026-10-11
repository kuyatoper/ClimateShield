<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Donation;
class Project extends Model
{
    protected $fillable = [
    'title',
    'description',
    'category',
    'status',
    'start_date',
    'end_date',
    'current_value',
    'target_value',
    'unit',
    ];
    protected $casts = [
    'start_date' => 'date',
    'end_date' => 'date',
    ];
    public function donations(): HasMany
{
    return $this->hasMany(Donation::class);
}
}