<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeRubroCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_rubro_course', function (Blueprint $table) {
            $table->increments('id_rc')->length('11');
            $table->text('rubro');
            $table->text('porcentaje');
            $table->integer('id_course')->length('11')->nullable()->unsigned();
            $table->text('status');
            $table->timestamps();
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
        Schema::dropIfExists('ce_rubro_course');
    }
}
