<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('userId');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('profilePicture');
            $table->string('gender');
            $table->string('role');
            $table->date('DOB');
            $table->string('address');
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
