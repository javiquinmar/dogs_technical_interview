<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsTable extends Migration
{
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->unsignedInteger('breed_id');
            $table->foreign('breed_id')->references('id')->on('breeds');

            $table->unsignedInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors');

            $table->unsignedInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->integer('age')->nullable();
            $table->integer('weight')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dogs');
    }
}
