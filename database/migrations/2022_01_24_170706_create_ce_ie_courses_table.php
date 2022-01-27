<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeIeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_ie_courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_iec')->length(11);
            $table->integer('id_ie')->length(11)->nullable()->unsigned();
            $table->integer('id_course')->length(11)->nullable()->unsigned();
            $table->foreign('id_ie')->references('id_ie')->on('ce_item_evaluation');
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
        Schema::dropIfExists('ce_ie_courses');
    }
}
