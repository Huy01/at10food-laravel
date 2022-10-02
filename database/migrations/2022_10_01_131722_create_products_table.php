<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('id_type');
            $table->foreign('id_type')->references('id')->on('type_products')->onUpdate('cascade')->onDelete('cascade');
            $table->string('description');
            $table->integer('unit_price');
            $table->integer('promotion_price');
            $table->string('image');
            $table->string('unit');
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
