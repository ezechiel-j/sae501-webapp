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
        Schema::create('plants_family', function (Blueprint $table) {
            $table->id('plant_family_id');
            $table->tinyText('plants_family_name');
            $table->foreignId('plant_id')->references('plant_id')->on('plants');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants_family');
    }
};
