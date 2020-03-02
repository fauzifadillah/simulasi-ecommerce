<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ProductID')->unsigned();
            $table->integer('OrderNumber');
            $table->integer('Price')->unsigned();
            $table->integer('Size')->unsigned();
            $table->integer('Color')->unsigned();
            $table->integer('Total');
            $table->timestamps();

            $table->foreign('ProductID')->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('Price')->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('Size')->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('Color')->references('id')->on('products')
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
        Schema::dropIfExists('order_details');
    }
}
