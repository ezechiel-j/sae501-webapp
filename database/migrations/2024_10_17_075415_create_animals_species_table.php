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
        Schema::create('animals_species', function (Blueprint $table) {
            $table->id('animal_species_id');
            $table->tinyText('animal_species_name');
            $table->foreignId('animal_family_id')->references('animal_family_id')->on('animals_family');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals_species');
    }
};
