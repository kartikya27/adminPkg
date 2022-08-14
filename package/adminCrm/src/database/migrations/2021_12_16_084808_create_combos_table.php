<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->id();
            $table->string('combo_name');
			$table->string('combo_sku')->nullable();
			$table->string('combo_category')->nullable();
            $table->string('combo_url');
			$table->string('combo_pic1');
            $table->string('combo_pic2')->nullable();
            $table->string('combo_pic3')->nullable();
            $table->string('combo_pic4')->nullable();
			$table->integer('combo_mrp')->nullable();
            $table->integer('combo_selling_price')->nullable();
            $table->string('price_filter');
			$table->string('combo_product_1_id');
			$table->string('combo_product_2_id');
			$table->string('combo_product_3_id');
			$table->string('combo_hasVariants')->nullable();
			$table->string('combo_variantType')->nullable();
			$table->string('combo_size')->nullable();
			$table->string('combo_variant1')->nullable();
			$table->string('combo_variant2')->nullable();
			$table->string('combo_variant3')->nullable();
			$table->string('combo_variant4')->nullable();
			$table->string('combo_variant5')->nullable();
			$table->string('combo_variant1sku')->nullable();
			$table->string('combo_variant2sku')->nullable();
			$table->string('combo_variant3sku')->nullable();
			$table->string('combo_variant4sku')->nullable();
			$table->string('combo_variant5sku')->nullable();
			$table->integer('combo_variant1price')->nullable();
			$table->integer('combo_variant2price')->nullable();
			$table->integer('combo_variant3price')->nullable();
			$table->integer('combo_variant4price')->nullable();
			$table->integer('combo_variant5price')->nullable();
			$table->integer('combo_variant1mrp')->nullable();
			$table->integer('combo_variant2mrp')->nullable();
			$table->integer('combo_variant3mrp')->nullable();
			$table->integer('combo_variant4mrp')->nullable();
			$table->integer('combo_variant5mrp')->nullable();
			$table->text('combo_description')->nullable();
			$table->text('combo_ingredients')->nullable();
			$table->text('combo_nutritionalFacts')->nullable();
			$table->text('combo_benefits')->nullable();
			$table->text('combo_otherInfo')->nullable();
			$table->string('combo_discountType')->nullable();
			$table->integer('combo_discountValue')->nullable();
            $table->string('combo_status');
            $table->bigInteger('combo_most-viewed');
            $table->bigInteger('combo_bestsellers');
			$table->text('combo_seoTitle')->nullable();
			$table->text('combo_seoDescription')->nullable();
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
        Schema::dropIfExists('combos');
    }
}
