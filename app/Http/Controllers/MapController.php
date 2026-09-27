<?php

namespace App\Http\Controllers;

use App\Models\Hazard;

class MapController extends Controller
{
    public function index()
{
    $hazards = Hazard::where('status', 'active')
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        ->latest()
        ->get();

    $mapReports = $hazards->map(function ($hazard) {
        return [
            'category' => strtolower(trim($hazard->type)) === 'flood'
            ? 'flood'
            : 'hazard',
            'position' => [
                (float) $hazard->latitude,
                (float) $hazard->longitude,
            ],
            'title' => $hazard->title,
            'location' => $hazard->location,
            'description' => $hazard->description,
            'severity' => $hazard->severity,
        ];
    })->values();

    return view('map', compact('hazards', 'mapReports'));
}
}