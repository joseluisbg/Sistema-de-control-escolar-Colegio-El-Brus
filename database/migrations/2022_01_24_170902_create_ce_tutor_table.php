<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_tutor', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_tutor')->length(11);
            $table->text('name')->nullable();
            $table->text('tel_1')->nullable();
            $table->text('tel_2')->nullable();
            $table->text('email')->nullable();
            $table->text('rfc')->nullable();
            $table->text('curp_student')->nullable();
            $table->text('principal')->nullable();
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
        Schema::dropIfExists('ce_tutor');
    }
}
