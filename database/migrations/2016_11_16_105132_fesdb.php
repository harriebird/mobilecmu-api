<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fesdb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('fesusers')->create('view_fes_users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('prisms_id', 15);
          $table->string('password', 64);
          $table->string('email', 100);
          $table->string('avatar', 100);
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
        Schema::connection('fesusers')->drop('view_fes_users');
    }
}
