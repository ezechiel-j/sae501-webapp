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
        Schema::create('hike_hosted_plants', function (Blueprint $table) {
            $table->id('hike_hosted_plant_id');
            $table->foreignId('hike_id')->references('hike_id')->on('hikes');
            $table->foreignId('plant_id')->references('plant_id')->on('plants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hike_hosted_plants');
    }
};
