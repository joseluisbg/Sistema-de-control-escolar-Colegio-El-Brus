<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_course', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_course')->length(11);
            $table->text('name');
            $table->text('nickname')->nullable();
            $table->text('nick_sep')->nullable();
            $table->integer('rep_sep')->length(11);
            $table->text('cycle');
            $table->integer('id_area')->length(11)->nullable()->unsigned();
            $table->text('status');
            $table->integer('user_modification')->length(11);
            $table->foreign('id_area')->references('id_area')->on('ce_area');
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
        Schema::dropIfExists('ce_course');
    }
}
