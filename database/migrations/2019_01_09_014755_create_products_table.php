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
            $table->increments('id');
            $table->integer('CategoryID')->unsigned();
            $table->integer('SKU');
            $table->string('ProductName');
            $table->string('ProductDescription');
            $table->integer('QTY');
            $table->integer('Price');
            $table->string('AvailSize');
            $table->string('AvailColor');
            $table->string('Size');
            $table->string('Color');
            $table->string('photo');
            $table->timestamps();

            $table->foreign('CategoryID')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
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
