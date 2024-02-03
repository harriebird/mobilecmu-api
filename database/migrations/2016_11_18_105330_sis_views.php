<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SisViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('sisproto')->create('sis_mobile_students', function (Blueprint $table) {
        $table->increments('id');
        $table->string('StudentNo', 15);
        $table->integer('TermID');
        $table->string('FirstName', 40);
        $table->string('Middlename', 30);
        $table->string('LastName', 30);
        $table->string('ProgShortName', 15);
        $table->string('ProgName', 70);
        $table->string('CollegeName', 30);
        $table->string('DateAdmitted', 24);
        $table->string('Gender', 6);
        $table->string('Perm_Address', 200);
        $table->string('Perm_Street', 200);
        $table->string('Perm_Barangay', 100);
        $table->string('Perm_TownCity', 100);
        $table->string('Perm_Province', 100);
        $table->integer('Perm_ZipCode');
        $table->integer('CurriculumID');
        $table->integer('YearLevelID');
        $table->integer('MajorDiscID')->nullable();
        $table->string('ProgDiscipline', 100)->nullable();
        $table->string('MajorDiscCode', 100)->nullable();
        $table->string('MajorDiscDesc', 100)->nullable();
      });

      Schema::connection('sisproto')->create('sis_mobile_grades', function (Blueprint $table) {
        $table->increments('id');
        $table->string('GradeIDX', 15);
        $table->string('Midterm', 5)->nullable();
        $table->string('Final', 5)->nullable();
        $table->string('ReExam', 5)->nullable();
        $table->integer('AcadUnits');
        $table->integer('CreditUnits');
        $table->integer('SubjectID');
        $table->string('StudentNo', 15);
        $table->integer('TermID');
        $table->string('AcademicYear', 24);
        $table->string('SchoolTerm', 24);
        $table->string('SubjectCode', 15);
        $table->string('SubjectDesc', 60);
        $table->string('FinalRemarks', 30);
        $table->string('DatePosted', 16);
      });

      Schema::connection('sisproto')->create('sis_mobile_ledgers', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('EntryID');
        $table->string('IDNo', 15);
        $table->integer('TermID');
        $table->integer('AccountID');
        $table->integer('DMCMRefNo');
        $table->integer('TransType');
        $table->string('AcctName', 80);
        $table->string('Remarks', 80);
        $table->decimal('Debit');
        $table->decimal('Credit');
        $table->boolean('NonLedger');
        $table->integer('DMCode');
        $table->integer('Particulars');
        $table->string('Description', 24);
        $table->string('ReferenceNo', 9);
        $table->string('TransDate', 24);
      });

      Schema::connection('sisproto')->create('sis_mobile_registrations', function (Blueprint $table) {
        $table->increments('id');
        $table->string('StudentNo', 15);
        $table->integer('TermID');
        $table->decimal('TotalAssessment');
        $table->decimal('TotalPayment');
        $table->integer('RegID');
        $table->string('ORNo', 7)->nullable();
        $table->string('ValidationDate', 24);
        $table->string('ExpireDate', 24)->nullable();
        $table->string('RegDate', 24);
        $table->string('ProgCode', 10);
        $table->string('ProgName', 70);
        $table->string('MajorDiscDesc', 70)->nullable();
        $table->integer('SchoProviderID')->nullable();
        $table->string('ProvCode', 10)->nullable();
        $table->string('ProvAcronym', 10)->nullable();
        $table->string('ProvName', 60)->nullable();
      });

      Schema::connection('sisproto')->create('sis_mobile_semesters', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('TermID');
        $table->string('AcademicYear', 24);
        $table->string('SchoolTerm', 24);
      });

      Schema::connection('sisproto')->create('sis_mobile_subjectsched', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('RegID');
        $table->integer('TermID');
        $table->string('SectionName', 15);
        $table->string('SubjectCode', 15);
        $table->string('SubjectTitle', 60);
        $table->integer('AcadUnits');
        $table->integer('CreditUnits');
        $table->string('Sched_1', 60);
        $table->integer('ScheduleID');
        $table->integer('Room1_ID');
        $table->string('RoomName', 15);
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('sis_mobile_students');
      Schema::drop('sis_mobile_grades');
      Schema::drop('sis_mobile_ledgers');
      Schema::drop('sis_mobile_registrations');
      Schema::drop('sis_mobile_semesters');
    }
}
