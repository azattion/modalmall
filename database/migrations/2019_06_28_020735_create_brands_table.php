<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid')->default(0)->index();
            $table->integer('ordr')->default(1);
            $table->string('name');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('brands');
    }
}
