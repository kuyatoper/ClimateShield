<?php

namespace App\Http\Controllers;

use App\Models\EnvironmentalReading;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnvironmentalHistoryController extends Controller
{
    public function index(Request $request): View
    {
        $range = $request->query('range', '24h');

        if (!in_array($range, ['24h', '7d', '30d'])) {
            $range = '24h';
        }

        $hours = match ($range) {
            '7d' => 24 * 7,
            '30d' => 24 * 30,
            default => 24,
        };

        $readings = EnvironmentalReading::query()
            ->where('location', 'Cebu City')
            ->where('recorded_at', '>=', now()->subHours($hours))
            ->orderBy('recorded_at')
            ->get();

        $latestReading = $readings->last();

        // 24-hour summary
        $summaryReadings = EnvironmentalReading::query()
        ->where('location', 'Cebu City')
        ->where('recorded_at', '>=', now()->subHours(24))
        ->get();

        $averageTemperature = $summaryReadings->avg('temperature');
        $highestTemperature = $summaryReadings->max('temperature');
        $lowestTemperature = $summaryReadings->min('temperature');
        $totalRainfall = $summaryReadings->sum('rainfall');
        $averageAqi = $summaryReadings->avg('aqi');

        $labels = $readings->map(function ($reading) {
            return $reading->recorded_at->format('M d H:i');
        })->values();

        $temperature = $readings->pluck('temperature')->values();
        $humidity = $readings->pluck('humidity')->values();
        $rainfall = $readings->pluck('rainfall')->values();
        $windSpeed = $readings->pluck('wind_speed')->values();
        $aqi = $readings->pluck('aqi')->values();

        return view('environmental-history', compact(
          'readings',
         'latestReading',
         'labels',
         'temperature',
         'humidity',
         'rainfall',
          'windSpeed',
         'aqi',
         'range',
         'averageTemperature',
         'highestTemperature',
         'lowestTemperature',
          'totalRainfall',
         'averageAqi'
        ));
    }
}