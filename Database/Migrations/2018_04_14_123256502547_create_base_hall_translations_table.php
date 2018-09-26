<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseHallTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base__hall_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('hall_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['hall_id', 'locale']);
            $table->foreign('hall_id')->references('id')->on('base__halls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('base__hall_translations', function (Blueprint $table) {
            $table->dropForeign(['hall_id']);
        });
        Schema::dropIfExists('base__hall_translations');
    }
}
