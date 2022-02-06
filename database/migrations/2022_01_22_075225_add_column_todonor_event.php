<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddColumnTodonorEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donor_event', function (Blueprint $table) {
            // $table->primary('event_id');
            $table->string('lokasi')->after('tgl_donor_mulai');
            $table->string('maps')->after('lokasi');
        });
        DB::statement('ALTER TABLE donor_event MODIFY event_id INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donor_event', function (Blueprint $table) {
            $table->dropColumn('lokasi');
            $table->dropColumn('maps');
        });
    }
}
