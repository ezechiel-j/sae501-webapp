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
        Schema::create('hike', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();

            $table->tinyText('name');
            $table->text('description');
            $table->integer('distance');
            $table->enum('difficulte', ['facile', 'moyen', 'difficile']);
            $table->boolean('retour_point_de_depart');
            $table->integer('duree_moyenne');
            $table->integer('deninvele_positif');
            $table->integer('deninvele_negatif');
            $table->integer('point_haut');
            $table->integer('point_bas');

            $table->text('image_src');
            $table->text('image_alt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hike');
    }
};
