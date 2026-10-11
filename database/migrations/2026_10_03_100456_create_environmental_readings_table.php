<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('environmental_readings', function (Blueprint $table) {
            $table->id();

            $table->string('location')->default('Cebu City');

            $table->decimal('temperature', 5, 2)->nullable();
            $table->decimal('humidity', 5, 2)->nullable();
            $table->decimal('rainfall', 7, 2)->nullable();
            $table->decimal('wind_speed', 7, 2)->nullable();

            $table->decimal('aqi', 7, 2)->nullable();
            $table->decimal('pm2_5', 7, 2)->nullable();
            $table->decimal('pm10', 7, 2)->nullable();

            $table->timestamp('recorded_at');

            $table->timestamps();

            $table->index('recorded_at');
            $table->index('location');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('environmental_readings');
    }
};