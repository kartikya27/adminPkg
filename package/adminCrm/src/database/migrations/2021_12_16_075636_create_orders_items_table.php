<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->id();
			$table->foreignId('orders_id');
			$table->string('product_type');
			$table->integer('DBID');
			$table->string('product_category');
			$table->string('product_name');
            $table->string('product_url');
            $table->string('product_pic1');
			$table->integer('product_price');
			$table->integer('product_mrp')->nullable();
            $table->string('product_sku');
            $table->integer('product_quantity');
			$table->string('product_hasVariant');
			$table->string('product_variationType')->nullable();
			$table->integer('product_variationNumber')->nullable();
			$table->string('product_variationValue')->nullable();
			$table->string('product_variationSKU')->nullable();
			$table->string('product_variationNOPPP')->nullable();
            $table->timestamps();
            $table->foreign('orders_id')->references('id')->on('orders');
        });	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_items');
    }
}
