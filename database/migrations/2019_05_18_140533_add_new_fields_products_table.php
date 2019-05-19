<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
//            $table->integer('quantity')->default(1);
            $table->boolean('as_new')->default(false);
            $table->date('as_new_start_date')->nullable();
            $table->date('as_new_end_date')->nullable();
            $table->boolean('sale')->default(false);
            $table->date('sale_start_date')->nullable();
            $table->date('sale_end_date')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_keywords')->nullable();
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
            $table->dropColumn(['as_new', 'as_new_start_date', 'as_new_end_date', 'sale', 'sale_start_date', 'sale_end_date']);
        });
    }
}
