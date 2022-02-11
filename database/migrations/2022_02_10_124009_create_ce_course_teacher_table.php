<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeCourseTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_course_teacher', function (Blueprint $table) {
            $table->increments('id_ct');
            $table->integer('id_course')->length(11)->nullable()->unsigned();
            $table->integer('id_user')->length(11)->nullable()->unsigned();
            $table->text('status')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_course')->references('id_course')->on('ce_course');
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
        Schema::dropIfExists('ce_course_teacher');
    }
}
