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
        Schema::create('plants_species', function (Blueprint $table) {
            $table->id('plant_species_id');
            $table->tinyText('plant_species_name');
            $table->foreignId('plant_family_id')->references('plant_family_id')->on('plants_family');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants_species');
    }
};
