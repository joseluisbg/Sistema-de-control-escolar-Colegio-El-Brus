<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeUserEnrolmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_user_enrolment', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_ue')->length(11);
            $table->integer('id_user')->length(11);
            $table->integer('id_course')->length(11)->nullable()->unsigned();
            $table->integer('id_lg')->length(11)->nullable()->unsigned();
            $table->foreign('id_lg')->references('id_lg')->on('ce_level_groups');
            $table->foreign('id_course')->references('id_course')->on('ce_course');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ce_user_enrolment');
    }
}
