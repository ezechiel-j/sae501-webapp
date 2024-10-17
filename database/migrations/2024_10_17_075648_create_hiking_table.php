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
        Schema::create('hiking', function (Blueprint $table) {
            $table->id('hiking_id');
            $table->foreignId('hike_id')->references('hike_id')->on('hikes');
            $table->foreignId('user_id')->references('id')->on('users');

            $table->timestamp('hiking_start_date');
            $table->timestamp('hiking_end_date')->nullable();
            $table->enum('hiking_status', ['En cours', 'Terminé']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiking');
    }
};
