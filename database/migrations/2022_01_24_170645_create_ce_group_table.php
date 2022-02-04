<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ce_group', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->increments('id_group')->length(11);
            $table->text('name');
            $table->text('status');
            $table->integer('user_modification')->length(11);
            $table->timestamps();
        });
    }

    //ALTER TABLE `ce_level_groups` ADD CONSTRAINT `Foreing` FOREIGN KEY (`id_group`) REFERENCES `ce_group`(`id_group`) ON DELETE CASCADE ON UPDATE CASCADE;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ce_group');
    }
}
