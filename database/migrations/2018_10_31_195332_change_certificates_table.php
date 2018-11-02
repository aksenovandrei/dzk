<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->integer('user_owner_id')->unsigned()->nullable();
            $table->foreign('user_owner_id')->references('id')->on('users');

            $table->integer('user_activator_id')->unsigned()->nullable();
            $table->foreign('user_activator_id')->references('id')->on('users');

            $table->integer('status_id')->unsigned()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->integer('address_id')->unsigned()->default(1);
            $table->foreign('address_id')->references('id')->on('addresses');

            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');

            $table->integer('product_id')->unsigned()->default(1);
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropForeign(['status_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
