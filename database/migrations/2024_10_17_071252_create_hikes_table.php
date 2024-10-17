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
        Schema::create('hikes', function (Blueprint $table) {
            $table->id('hike_id');
            $table->tinyText('hike_name');
            $table->integer('hike_distance');
            $table->integer('hike_average_duration');
            $table->enum('hike_difficulty', ['Facile', 'Moyen', 'Difficile']);
            $table->boolean('hike_start_point_return');
            $table->integer('hike_ascendant');
            $table->integer('hike_descendant');
            $table->integer('hike_top_point');
            $table->integer('hike_bottom_point');
            $table->boolean('hike_favoured');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hikes');
    }
};
