<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProductInFinalWarehouseAdjustDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('final_warehouse_adjust_details', function (Blueprint $table) {
			$table->dropForeign(['g7_product_id']);
			$table->dropColumn('g7_product_id');
			$table->unsignedBigInteger('product_id')->nullable();
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
        Schema::table('final_warehouse_adjust_details', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
			$table->dropColumn('product_id');
			$table->unsignedBigInteger('g7_product_id')->nullable();
            $table->foreign('g7_product_id')->references('id')->on('g7_products');
        });
    }
}
