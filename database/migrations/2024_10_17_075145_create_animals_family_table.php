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
        Schema::create('animals_family', function (Blueprint $table) {
            $table->id('animal_family_id');
            $table->tinyText('animal_family_name');
            $table->foreignId('animal_id')->references('animal_id')->on('animals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals_family');
    }
};
