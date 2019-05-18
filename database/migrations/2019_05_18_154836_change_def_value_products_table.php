<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDefValueProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('desc')->nullable(true)->change();
            $table->tinyInteger('size')->nullable(true)->change();

            $table->string('num_sizes')->nullable(true);
            $table->string('composition')->nullable(true)->change();
            $table->string('age')->nullable(true)->change();
            $table->string('color')->nullable(true)->change();

            $table->integer('quantity')->nullable(true)->change();
            $table->integer('unit')->nullable(true)->change();
            $table->integer('pack_price')->nullable(true)->change();
            $table->integer('price')->default(0)->change();
            $table->integer('tax')->nullable(true)->change();
            $table->integer('available')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('desc')->nullable(false)->change();
            $table->tinyInteger('size')->nullable(false)->change();

            $table->string('num_sizes')->nullable(false);
            $table->string('composition')->nullable(false)->change();
            $table->string('age')->nullable(false)->change();
            $table->string('color')->nullable(false)->change();

            $table->integer('quantity')->nullable(false)->change();
            $table->integer('unit')->nullable(false)->change();
            $table->integer('pack_price')->nullable(true)->change();
            $table->integer('price')->default(0)->change();
            $table->integer('tax')->nullable(false)->change();
            $table->integer('available')->nullable(false)->change();
        });
    }
}
