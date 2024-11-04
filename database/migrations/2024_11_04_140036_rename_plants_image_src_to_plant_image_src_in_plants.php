<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePlantsImageSrcToPlantImageSrcInPlants extends Migration
{
    public function up()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->renameColumn('plants_image_src', 'plant_image_src');
        });
    }

    public function down()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->renameColumn('plant_image_src', 'plants_image_src');
        });
    }
}
