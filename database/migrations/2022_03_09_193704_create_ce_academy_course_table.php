<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeAcademyCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_academy_course', function (Blueprint $table) {
            $table->increments('id_ac');
            $table
                ->integer('id_academy')
                ->length(11)
                ->nullable()
                ->unsigned();
            $table
                ->integer('id_course')
                ->length(11)
                ->nullable()
                ->unsigned();
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
        Schema::dropIfExists('ce_academy_course');
    }
}
