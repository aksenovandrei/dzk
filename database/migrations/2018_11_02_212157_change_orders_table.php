<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->integer('product_id')->unsigned();
//            $table->foreign('product_id')->references('id')->on('products');
//
            $table->integer('promoCode_id')->unsigned()->nullable();
//            $table->foreign('promoCode_id')->references('id')->on('promocodes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
//            $table->dropForeign(['product_id']);
//            $table->dropForeign(['certificate_id']);
//            $table->dropForeign(['promoCode_id']);
        });
    }
}
