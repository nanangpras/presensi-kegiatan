<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumntoDEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d_event', function (Blueprint $table) {
            $table->integer('id_cabang')->after('event_id');
            $table->integer('element_id')->after('id_cabang');
            $table->string('lokasi')->after('nama');
            $table->string('maps')->after('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_event', function (Blueprint $table) {
            $table->dropColumn('id_cabang');
            $table->dropColumn('element_id');
            $table->dropColumn('lokasi');
            $table->dropColumn('maps');
        });
    }
}
