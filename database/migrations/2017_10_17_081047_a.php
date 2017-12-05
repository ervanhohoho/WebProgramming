<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class A extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Shoes', function (Blueprint $table) {
            $table->increments('shoesId');
            $table->string('name');
            $table->string('image');
            $table->integer('brandId');
            $table->string('description');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('stock'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
