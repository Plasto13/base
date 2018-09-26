<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base__lines', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('position')->unsigned()->default(0);
            $table->integer('hall_id')->unsigned()->nullable();
            $table->string('equipment_number')->nullable();
            $table->string('equipment_name');
            $table->string('location')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('producer')->nullable();
            $table->string('manuf_year')->nullable();
            $table->date('commissioning')->nullable();
            $table->string('sap_inven_number')->nullable();
            $table->string('type')->nullable();
            $table->text('media')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('base__lines');
    }
}
