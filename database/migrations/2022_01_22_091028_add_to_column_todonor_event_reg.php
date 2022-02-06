<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddToColumnTodonorEventReg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donor_event_reg', function (Blueprint $table) {
            $table->primary('id');
            $table->string('status')->after('warga_id');
            $table->string('keterangan')->after('status');

        });
        DB::statement('ALTER TABLE donor_event_reg MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donor_event_reg', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('keterangan');
        });
    }
}
