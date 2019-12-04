<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('caption')->nullable(true);
            $table->string('name');
            $table->string('ext', 5);
            $table->string('path');
            $table->integer('height', false, true)->default(0);
            $table->integer('width', false, true)->default(0);
            $table->integer('size')->default(0);
            $table->boolean('status')->default(true);
            $table->string('uid')->nullable(true)->index();
            $table->string('desc')->nullable(true);
            $table->tinyInteger('color')->default(0);
            $table->string('imageable_type')->default(0);
            $table->integer('imageable_id')->default(0)->index();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
