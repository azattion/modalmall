<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('cat')->index();
            $table->string('vendor_code');
            $table->string('barcode');
            $table->string('collection');
            $table->tinyInteger('sex');
            $table->text('desc');
            $table->string('img');

            $table->tinyInteger('size');
            $table->string('num_sizes');
            $table->string('composition');
            $table->string('age');
            $table->string('color');

            $table->integer('quantity');
            $table->integer('unit');
            $table->integer('pack_price');
            $table->integer('price');
            $table->integer('tax');
            $table->integer('available');
            $table->boolean('status')->default(true)->index();
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
        Schema::dropIfExists('products');
    }
}
