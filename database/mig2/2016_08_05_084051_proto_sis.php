<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Protosis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tblStudents', function (Blueprint $table) {
          $table->increments('id');
          $table->string('no', 11);
          $table->string('pass', 40);
          $table->integer('activated');
          $table->string('lname', 30);
          $table->string('fname', 40);
          $table->string('mname', 30);
          $table->string('addr', 100);
          $table->string('gender', 6);
          $table->string('bday', 16);
          $table->string('program', 60);
          $table->string('major', 40)->nullable();
          $table->string('college', 30);
          $table->string('admission', 16);
          $table->string('year', 9);
          $table->string('scholar', 60)->nullable();
          $table->timestamps();
      });
      Schema::create('tblSemesters', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name', 24);
          $table->timestamps();
      });
      Schema::create('tblGrades', function (Blueprint $table) {
          $table->increments('id');
          $table->string('studno', 11);
          $table->integer('semid');
          $table->string('subcode', 15);
          $table->string('subdesc', 60);
          $table->integer('subunits');
          $table->string('midgrade', 5);
          $table->string('fingrade', 5)->nullable();
          $table->string('reexgrade', 5)->nullable();
          $table->string('instructor', 60);
          $table->string('remarks', 20)->nullable();
          $table->string('posted', 25);
          $table->timestamps();
      });
      Schema::create('tblCors', function (Blueprint $table) {
          $table->increments('id');
          $table->string('studno', 11);
          $table->integer('semid');
          $table->decimal('payment');
          $table->string('regno', 10);
          $table->string('orno', 7);
          // $table->string('units',2);
          $table->string('valdate', 24);
          $table->string('scholar', 60)->nullable();
          $table->timestamps();
      });
      Schema::create('tblSubLoads', function (Blueprint $table) {
          $table->increments('id');
          $table->string('studno', 11);
          $table->integer('semid');
          $table->string('seccode', 14);
          $table->string('subcode', 15);
          $table->string('subdesc', 60);
          $table->integer('subunits');
          $table->string('instructor', 60);
          $table->string('day', 10)->nullable();
          $table->string('time', 25)->nullable();
          $table->string('room', 10)->nullable();
          $table->timestamps();
      });
      Schema::create('tblCharges', function (Blueprint $table) {
          $table->increments('id');
          $table->string('studno', 11);
          $table->integer('semid');
          $table->string('name', 80);
          $table->decimal('amount');
          $table->timestamps();
      });
      Schema::create('tblLedgers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('studno', 11);
          $table->integer('semid');
          $table->string('trdate', 20);
          $table->string('trcode', 5);
          $table->string('refno', 9);
          $table->decimal('debit');
          $table->decimal('credit');
          $table->decimal('bal');
          $table->string('remarks', 40);
          $table->string('posted', 15);
          $table->timestamps();
      });
      Schema::create('tblEvals', function (Blueprint $table) {
          $table->increments('id');
          $table->string('studno', 11);
          $table->integer('semid');
          $table->string('subcode', 15);
          $table->string('subdesc', 60);
          $table->string('fingrade', 5)->nullable();
          $table->string('reexgrade', 5)->nullable();
          $table->string('remarks', 20)->nullable();
          $table->timestamps();
      });
      Schema::create('tblEvalSems', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name', 24);
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
      Schema::drop('tblStudents');
      Schema::drop('tblSemesters');
      Schema::drop('tblGrades');
      Schema::drop('tblCors');
      Schema::drop('tblSubLoads');
      Schema::drop('tblCharges');
      Schema::drop('tblLedgers');
      Schema::drop('tblEvals');
      Schema::drop('tblEvalSems');
    }
}
