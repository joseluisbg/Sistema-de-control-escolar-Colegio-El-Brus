<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeStudentTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_student_tutor', function (Blueprint $table) {
            $table->increments('id_st');
            $table->integer('id_student')->length(11)->nullable()->unsigned();
            $table->integer('id_user')->length(11)->nullable()->unsigned();
            $table->integer('tutor');
            //$table->foreign('id_user')->references('id')->on('users');
            //$table->foreign('id_student')->references('id_student')->on('ce_student');
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
        Schema::dropIfExists('ce_student_tutor');
    }
}
