<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDayIntervalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_interval', function (Blueprint $table) {
            $table->integer('day_id')->unsigned()->nullable();
            $table->foreign('day_id')->references('id')->on('days');
            $table->integer('interval_id')->unsigned()->nullable();
            $table->foreign('interval_id')->references('id')->on('intervals');
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
