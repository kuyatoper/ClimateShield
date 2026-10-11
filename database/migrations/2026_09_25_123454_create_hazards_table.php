<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hazards', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('type');
            $table->text('description');
            $table->string('location');

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->enum('severity', [
                'low',
                'moderate',
                'high',
                'critical'
            ])->default('moderate');

            $table->enum('status', [
                'active',
                'resolved'
            ])->default('active');

            $table->enum('verification_status', [
                'pending',
                'verified',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hazards');
    }
};