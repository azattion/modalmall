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
            $table->string('vendor_code')->nullable(true);
            $table->string('barcode')->nullable(true);
            $table->string('collection')->nullable(true);
            $table->tinyInteger('sex')->nullable(true);

            $table->text('desc')->nullable(true);
            $table->tinyInteger('size')->nullable(true);

            $table->string('num_sizes')->nullable(true);
            $table->string('composition')->nullable(true);
            $table->string('age')->nullable(true);
            $table->string('color')->nullable(true);

            $table->integer('quantity')->nullable(true);
            $table->integer('unit')->nullable(true);
            $table->integer('pack_price')->nullable(true);
            $table->integer('price')->default(0);
            $table->integer('tax')->nullable(true);
            $table->integer('available')->nullable(true);
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
