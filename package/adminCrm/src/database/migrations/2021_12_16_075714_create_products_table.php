<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
			$table->string('product_sku')->nullable();
			$table->string('product_category');
            $table->string('product_url');
			$table->string('product_pic1');
            $table->string('product_pic2')->nullable();
            $table->string('product_pic3')->nullable();
            $table->string('product_pic4')->nullable();
			$table->integer('product_mrp')->nullable();
            $table->integer('product_selling_price')->nullable();
            $table->string('price_filter');
			$table->integer('product_quantity')->nullable();
			$table->string('product_hasVariants')->nullable();
			$table->string('product_variantType')->nullable();
			$table->string('product_variant1')->nullable();
			$table->string('product_variant2')->nullable();
			$table->string('product_variant3')->nullable();
			$table->string('product_variant4')->nullable();
			$table->string('product_variant5')->nullable();
			$table->string('product_variant1sku')->nullable();
			$table->string('product_variant2sku')->nullable();
			$table->string('product_variant3sku')->nullable();
			$table->string('product_variant4sku')->nullable();
			$table->string('product_variant5sku')->nullable();
			$table->integer('product_variant1qty')->nullable();
			$table->integer('product_variant2qty')->nullable();
			$table->integer('product_variant3qty')->nullable();
			$table->integer('product_variant4qty')->nullable();
			$table->integer('product_variant5qty')->nullable();
			$table->integer('product_variant1price')->nullable();
			$table->integer('product_variant2price')->nullable();
			$table->integer('product_variant3price')->nullable();
			$table->integer('product_variant4price')->nullable();
			$table->integer('product_variant5price')->nullable();
			$table->integer('product_variant1mrp')->nullable();
			$table->integer('product_variant2mrp')->nullable();
			$table->integer('product_variant3mrp')->nullable();
			$table->integer('product_variant4mrp')->nullable();
			$table->integer('product_variant5mrp')->nullable();
			$table->text('product_description')->nullable();
			$table->text('product_ingredients')->nullable();
			$table->text('product_nutritionalFacts')->nullable();
			$table->text('product_benefits')->nullable();
			$table->text('product_otherInfo')->nullable();
			$table->string('product_discountType')->nullable();
			$table->integer('product_discountValue')->nullable();
            $table->string('product_status');
            $table->bigInteger('product_most-viewed');
            $table->bigInteger('product_bestsellers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
