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
            $table->string('cats')->nullable(true);
            $table->string('vendor_code')->nullable(true);
            $table->string('barcode')->nullable(true);
            $table->string('collection')->nullable(true);
//            $table->tinyInteger('sex')->nullable(true);

            $table->text('desc')->nullable(true);
            $table->string('sizes')->nullable(true);

            $table->string('num_sizes')->nullable(true);
            $table->string('composition')->nullable(true);
            $table->string('age')->nullable(true);
            $table->string('colors')->nullable();
            $table->integer('brand')->default(0);
            $table->integer('producer')->default(0);

            $table->integer('quantity')->nullable(true);
            $table->integer('unit')->nullable(true);
            $table->integer('pack_price')->nullable(true);
            $table->integer('price')->default(0);
            $table->integer('tax')->nullable(true);
//            $table->integer('available')->nullable(true);
            $table->boolean('status')->default(true)->index();
            $table->integer('uid')->default(0)->index();

            $table->boolean('as_new')->default(false);
            $table->date('as_new_start_date')->nullable();
            $table->date('as_new_end_date')->nullable();
            $table->boolean('sale')->default(false);
            $table->date('sale_start_date')->nullable();
            $table->date('sale_end_date')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
