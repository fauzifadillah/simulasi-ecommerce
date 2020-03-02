<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_buy');
            $table->string('id_cart');
            $table->string('qty')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('price')->nullable();
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
       Schema::dropIfExists('carts');
    }
}
