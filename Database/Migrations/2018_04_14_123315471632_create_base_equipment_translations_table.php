<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseEquipmentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base__equipment_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('equipment_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['equipment_id', 'locale']);
            $table->foreign('equipment_id')->references('id')->on('base__equipment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('base__equipment_translations', function (Blueprint $table) {
            $table->dropForeign(['equipment_id']);
        });
        Schema::dropIfExists('base__equipment_translations');
    }
}
