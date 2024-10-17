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
        Schema::create('hike_hosted_animals', function (Blueprint $table) {
            $table->id('hike_hosted_animal_id');
            $table->foreignId('hike_id')->references('hike_id')->on('hikes');
            $table->foreignId('animal_id')->references('animal_id')->on('animals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hike_hosted_animals');
    }
};
