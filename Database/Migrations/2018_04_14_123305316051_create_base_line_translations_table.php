<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseLineTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base__line_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('line_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['line_id', 'locale']);
            $table->foreign('line_id')->references('id')->on('base__lines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('base__line_translations', function (Blueprint $table) {
            $table->dropForeign(['line_id']);
        });
        Schema::dropIfExists('base__line_translations');
    }
}
