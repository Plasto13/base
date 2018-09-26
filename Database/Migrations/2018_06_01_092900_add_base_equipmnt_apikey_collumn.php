<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBaseEquipmntApikeyCollumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('base__equipment', function (Blueprint $table) {
            $table->string('api_key')->nullable();
        });
         Schema::table('base__lines', function (Blueprint $table) {
            $table->string('api_key')->nullable()->after('id');
        });
         Schema::table('base__halls', function (Blueprint $table) {
            $table->string('api_key')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('base__equipment', function (Blueprint $table) {
            $table->dropColumn('api_key');
        });
        Schema::table('base__lines', function (Blueprint $table) {
            $table->dropColumn('api_key');
        });
        Schema::table('base__halls', function (Blueprint $table) {
            $table->dropColumn('api_key');
        });
    }
}
