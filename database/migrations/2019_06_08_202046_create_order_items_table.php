<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid')->default(0)->index();
            $table->integer('oid')->default(0)->index();
            $table->integer('uid')->default(0)->index();
            $table->integer('qt')->default(0);
            $table->integer('color')->default(0);
            $table->integer('size')->default(0);
            $table->integer('status')->default(0);
            $table->integer('cost')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('order_items');
    }
}
