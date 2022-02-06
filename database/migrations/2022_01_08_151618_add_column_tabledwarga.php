<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTabledwarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d_warga', function (Blueprint $table) {
            $table->string('status_warga')->after('pendidikan');
            $table->string('lanjutan_warga')->after('status_warga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d_warga', function (Blueprint $table) {
            $table->dropColumn('status_warga');
            $table->dropColumn('lanjutan_warga');
        });
    }
}
