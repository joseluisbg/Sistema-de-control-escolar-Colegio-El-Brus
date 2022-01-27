<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_level', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_level')->length(11);
            $table->string('name');
            $table->string('nickname');
            $table->integer('id_area')->length(11)->nullable()->unsigned();
            $table->string('status');
            $table->integer('user_modification')->length(11);
            $table->timestamps();
            $table->foreign('id_area')->references('id_area')->on('ce_area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ce_level');
    }
}
