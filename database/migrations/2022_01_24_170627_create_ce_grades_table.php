<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_grades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_grade')->length(11);
            $table->integer('id_student')->length(11)->nullable()->unsigned();
            $table->integer('id_teacher')->length(11)->nullable()->unsigned();
            $table->integer('id_course')->length(11)->nullable()->unsigned();
            $table->integer('id_cycle')->length(11)->nullable()->unsigned();
            $table->integer('id_ie')->length(11)->nullable()->unsigned();
            $table->integer('id_period')->length(11)->nullable()->unsigned();
            $table->text('value');
            $table->text('status');
            $table->integer('user_modification')->length(11);
            $table->timestamps();
            $table->foreign('id_student')->references('id_student')->on('ce_student');
            $table->foreign('id_course')->references('id_course')->on('ce_course');
            //$table->foreign('id_teacher')->references('id_teacher')->on('ce_teacher');
            $table->foreign('id_cycle')->references('id_cycle')->on('ce_cycle');
            $table->foreign('id_ie')->references('id_ie')->on('ce_item_evaluation');
            $table->foreign('id_period')->references('id_period')->on('ce_period');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ce_grades');
    }
}
