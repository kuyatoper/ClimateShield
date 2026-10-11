<?php

namespace App\Console\Commands;

use App\Models\EnvironmentalReading;
use App\Services\WeatherService;
use Illuminate\Console\Command;

class CollectEnvironmentalData extends Command
{
    protected $signature = 'climate:collect';

    protected $description = 'Collect current environmental data for Cebu City';

    public function handle(WeatherService $weatherService): int
    {
        $weather = $weatherService->getCebuWeather();
        $airQuality = $weatherService->getCebuAirQuality();

        if (!$weather || !$airQuality) {
            $this->error('Unable to retrieve environmental data.');

            return self::FAILURE;
        }

        $currentWeather = $weather['current'] ?? [];
        $currentAirQuality = $airQuality['current'] ?? [];

        EnvironmentalReading::create([
            'location' => 'Cebu City',

            'temperature' => $currentWeather['temperature_2m'] ?? null,
            'humidity' => $currentWeather['relative_humidity_2m'] ?? null,
            'rainfall' => $currentWeather['precipitation'] ?? null,
            'wind_speed' => $currentWeather['wind_speed_10m'] ?? null,

            'aqi' => $currentAirQuality['european_aqi'] ?? null,
            'pm2_5' => $currentAirQuality['pm2_5'] ?? null,
            'pm10' => $currentAirQuality['pm10'] ?? null,

            'recorded_at' => now(),
        ]);

        $this->info('Environmental reading saved successfully.');

        return self::SUCCESS;
    }
}