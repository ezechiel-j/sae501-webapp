<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discover_plants', function (Blueprint $table) {
            $table->id('discover_plant_id');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('plant_id')->references('plant_id')->on('plants');
            $table->foreignId('hike_id')->references('hike_id')->on('hikes');

            $table->boolean('discoverd_plant_favoured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discover_plants');
    }
};
