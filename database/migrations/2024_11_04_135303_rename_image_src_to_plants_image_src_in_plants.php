<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameImageSrcToPlantsImageSrcInPlants extends Migration
{
    public function up()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->renameColumn('image_src', 'plants_image_src');
        });
    }

    public function down()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->renameColumn('plants_image_src', 'image_src');
        });
    }
}
