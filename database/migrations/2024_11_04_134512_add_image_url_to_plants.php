<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageUrlToPlants extends Migration
{
    public function up()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->string('image_src');
        });
    }

    public function down()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropColumn('image_src');
        });
    }
}
