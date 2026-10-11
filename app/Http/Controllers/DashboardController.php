<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Hazard;
use Illuminate\View\View;
use App\Services\WeatherService;

class DashboardController extends Controller
{
    public function index(WeatherService $weatherService): View
    {
        $hazards = Hazard::where('status', 'active')
            ->latest()
            ->get();

        $projects = Project::latest()->get();

        $activeFloods = $hazards->filter(function ($hazard) {
            return strtolower(trim($hazard->type)) === 'flood';
        });

        if ($activeFloods->contains(fn ($hazard) => strtolower(trim($hazard->severity)) === 'critical')) {
            $floodRisk = 'CRITICAL';
            $floodLevel = 'Level 4';
        } elseif ($activeFloods->contains(fn ($hazard) => strtolower(trim($hazard->severity)) === 'high')) {
            $floodRisk = 'HIGH';
            $floodLevel = 'Level 3';
        } elseif ($activeFloods->contains(fn ($hazard) => strtolower(trim($hazard->severity)) === 'moderate')) {
            $floodRisk = 'MODERATE';
            $floodLevel = 'Level 2';
        } else {
            $floodRisk = 'LOW';
            $floodLevel = 'Level 1';
        }

        // Weather API
        $weather = $weatherService->getCebuWeather();

        $temperature = $weather['current']['temperature_2m'] ?? null;
        $humidity = $weather['current']['relative_humidity_2m'] ?? null;
        $rainfall = $weather['current']['precipitation'] ?? null;
        $windSpeed = $weather['current']['wind_speed_10m'] ?? null;

        // Air Quality API
        $airQuality = $weatherService->getCebuAirQuality();

        $aqi = $airQuality['current']['european_aqi'] ?? null;
        $pm25 = $airQuality['current']['pm2_5'] ?? null;

        return view('dashboard', compact(
        'hazards',
        'projects',
        'floodRisk',
        'floodLevel',
        'temperature',
        'humidity',
        'rainfall',
        'windSpeed',
        'aqi',
        'pm25'
        ));
    }
}