<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSlidersTable extends Migration
{

    public function up()
    {
        Schema::create('tbl__sliders', function (Blueprint $table) {
            $table->increments('slider_id');
            $table->string('slider_image');
            $table->integer('publication_status');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tbl__sliders');
    }
}
