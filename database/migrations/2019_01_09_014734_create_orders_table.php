<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('CustomerID')->unsigned();   
            $table->integer('OrderNumber');
            $table->integer('PaymentType')->unsigned();
            $table->integer('OrderDate');    
            $table->string('Status');
            $table->timestamps();

            $table->foreign('CustomerID')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('PaymentType')->references('id')->on('payments')
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
        Schema::dropIfExists('orders');
    }
}
