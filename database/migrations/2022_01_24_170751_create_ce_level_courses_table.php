<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeLevelCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_level_courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_lc')->length(11);
            $table->integer('id_level')->length(11)->nullable()->unsigned();
            $table->integer('id_course')->length(11)->nullable()->unsigned();
            $table->text('status');
            $table->integer('user_modification')->length(11);
            $table->timestamps();
            $table->foreign('id_level')->references('id_level')->on('ce_level');
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
        Schema::dropIfExists('ce_level_courses');
    }
}
