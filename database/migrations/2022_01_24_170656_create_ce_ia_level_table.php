<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeIaLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_ia_level', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_ial')->length(11);
            $table->integer('id_level')->length(11)->nullable()->unsigned();
            $table->integer('id_ia')->length(11)->nullable()->unsigned();
            $table->foreign('id_level')->references('id_level')->on('ce_level');
            $table->foreign('id_ia')->references('id_ia')->on('ce_item_average');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ce_ia_level');
    }
}
