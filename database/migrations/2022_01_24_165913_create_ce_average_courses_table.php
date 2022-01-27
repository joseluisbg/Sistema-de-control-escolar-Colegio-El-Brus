<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeAverageCoursesTable extends Migration
{
    /**
     * Run the migrations. 170719 / 2022_01_24_170558_create_ce_course_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_average_courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_ac')->length(11);
            $table->integer('id_ia')->length(11)->nullable()->unsigned();
            $table->integer('id_course')->length(11)->nullable()->unsigned();
            $table->foreign('id_ia')->references('id_ia')->on('ce_item_average');
            $table->foreign('id_course','consulta')->references('id_course')->on('ce_course');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ce_average_courses');
    }
}
