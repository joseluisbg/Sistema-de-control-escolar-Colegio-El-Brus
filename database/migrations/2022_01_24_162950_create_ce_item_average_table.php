<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeItemAverageTable extends Migration
{
    /**
     * Run the migrations. 170719 2022_01_24_170558_create_ce_course_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_item_average', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_ia')->length(11);
            $table->text('name');
            $table->text('valor');
            $table->text('status');
            $table->integer('user_modification')->length(11);
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
        Schema::dropIfExists('ce_item_average');
    }
}
