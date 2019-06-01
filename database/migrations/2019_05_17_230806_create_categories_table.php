<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid')->default(0);
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->boolean('inc_menu')->default(1);
            $table->string('img')->nullable(true);
            $table->text('desc')->nullable(true);
            $table->string('meta_title')->nullable(true);
            $table->string('meta_keywords')->nullable(true);
            $table->string('meta_desc')->nullable(true);
            $table->integer('uid')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
