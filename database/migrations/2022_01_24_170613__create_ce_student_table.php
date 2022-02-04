<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_student', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_student')->length(11);
            $table->text('matricula');
            $table->text('name');
            $table->text('curp');
            $table->text('street')->nullable();
            $table->text('suburb')->nullable();
            $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('cp')->nullable();
            $table->text('date_ofbirth')->nullable();
            $table->text('status');
            $table->text('user_modification');
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
        Schema::dropIfExists('ce_student');
    }
}
