<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeLevelGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_level_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_lg')->length(11);
            $table->integer('id_level')->length(11)->nullable()->unsigned();
            $table->integer('id_group')->length(11)->nullable()->unsigned();
            $table->text('status');
            $table->integer('user_modification')->length(11);
            $table->timestamps();
            $table->foreign('id_group')->references('id_group')->on('ce_group');
            $table->foreign('id_level')->references('id_level')->on('ce_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ce_level_groups');
    }
}
