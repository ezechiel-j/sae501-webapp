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
        Schema::create('discover_animals', function (Blueprint $table) {
            $table->id('discover_animal_id');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('animal_id')->references('animal_id')->on('animals');
            $table->foreignId('hike_id')->references('hike_id')->on('hikes');

            $table->boolean('discoverd_animal_favoured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discover_animals');
    }
};
