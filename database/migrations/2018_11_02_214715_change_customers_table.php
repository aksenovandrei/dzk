<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
//            $table->foreign('product_id')->references('id')->on('products');
//
            $table->string('order_id');
//            $table->foreign('order_id')->references('id')->on('orders');
//
            $table->integer('certificate_id')->unsigned();
//            $table->foreign('certificate_id')->references('id')->on('certificates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
//            $table->dropForeign(['product_id']);
//            $table->dropForeign(['certificate_id']);
//            $table->dropForeign(['order_id']);
        });
    }
}
