<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getCebuWeather(): ?array
    {
        $response = Http::timeout(10)->get('https://api.open-meteo.com/v1/forecast', [
            'latitude' => 10.3157,
            'longitude' => 123.8854,
            'current' => 'temperature_2m,relative_humidity_2m,precipitation,wind_speed_10m',
            'timezone' => 'Asia/Manila',
        ]);

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }
    public function getCebuAirQuality(): ?array
    {
    $response = Http::timeout(10)->get('https://air-quality-api.open-meteo.com/v1/air-quality', [
        'latitude' => 10.3157,
        'longitude' => 123.8854,
        'current' => 'european_aqi,pm2_5,pm10',
        'timezone' => 'Asia/Manila',
    ]);

    if ($response->failed()) {
        return null;
    }

    return $response->json();
    }
}