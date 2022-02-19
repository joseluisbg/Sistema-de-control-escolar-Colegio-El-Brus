<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeLgCtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_lg_ct', function (Blueprint $table) {
            $table->increments('id_lgct');
            $table->integer('id_lg')->length(11)->nullable()->unsigned();
            $table->integer('id_ct')->length(11)->nullable()->unsigned();
            $table->foreign('id_lg')->references('id_lg')->on('ce_level_groups');
            $table->foreign('id_ct')->references('id_ct')->on('ce_course_teacher');
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
        Schema::dropIfExists('ce_lg_ct');
    }
}
