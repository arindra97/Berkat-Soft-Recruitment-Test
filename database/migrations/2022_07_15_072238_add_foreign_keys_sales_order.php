<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_order', function (Blueprint $table) {
            $table->foreign('product_id', 'fk_sales_order_to_product')->references('id')->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('users_id', 'fk_sales_order_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_order', function (Blueprint $table) {
            $table->dropForeign('fk_sales_order_to_product');
            $table->dropForeign('fk_sales_order_to_users');
        });
    }
};
