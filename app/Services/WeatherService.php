<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\ConnectionException;

class WeatherService
{
    public function getCebuWeather(): ?array
    {
        return Cache::remember('cebu_weather', now()->addMinutes(5), function () {
            try {
                $response = Http::timeout(10)->get(
                    'https://api.open-meteo.com/v1/forecast',
                    [
                        'latitude' => 10.3157,
                        'longitude' => 123.8854,
                        'current' => 'temperature_2m,relative_humidity_2m,precipitation,wind_speed_10m',
                        'timezone' => 'Asia/Manila',
                    ]
                );

                if ($response->failed()) {
                    return null;
                }

                return $response->json();

            } catch (ConnectionException $e) {
                return null;
            }
        });
    }

    public function getCebuAirQuality(): ?array
    {
        return Cache::remember('cebu_air_quality', now()->addMinutes(10), function () {
            try {
                $response = Http::timeout(10)->get(
                    'https://air-quality-api.open-meteo.com/v1/air-quality',
                    [
                        'latitude' => 10.3157,
                        'longitude' => 123.8854,
                        'current' => 'european_aqi,pm2_5,pm10',
                        'timezone' => 'Asia/Manila',
                    ]
                );

                if ($response->failed()) {
                    return null;
                }

                return $response->json();

            } catch (ConnectionException $e) {
                return null;
            }
        });
    }
}