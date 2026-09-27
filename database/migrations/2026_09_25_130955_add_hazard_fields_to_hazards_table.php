<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hazards', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('type')->after('title');
            $table->text('description')->after('type');
            $table->string('location')->after('description');
            $table->string('severity')->default('moderate')->after('location');
            $table->string('status')->default('active')->after('severity');
        });
    }

    public function down(): void
    {
        Schema::table('hazards', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'type',
                'description',
                'location',
                'severity',
                'status',
            ]);
        });
    }
};