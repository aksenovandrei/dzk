<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDayIntervalTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_interval', function (Blueprint $table) {
            $table->integer('is_visible');
            $table->integer('aircraft_id');
            $table->integer('numberOfAvailableSeats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('day_interval', function (Blueprint $table) {
            //
        });
    }
}
