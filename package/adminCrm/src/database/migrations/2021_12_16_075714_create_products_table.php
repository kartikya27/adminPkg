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
            $table->string('programName');
			$table->string('program_code')->nullable();
			$table->string('program_category');
            $table->string('program_url');
            $table->string('heading');
            $table->string('subHeading')->nullable();
			$table->string('program_pic1');
            $table->string('program_pic2')->nullable();
            $table->string('program_pic3')->nullable();
            $table->string('program_pic4')->nullable();
            $table->string('filter');
			$table->text('programDescription')->nullable();
			$table->text('description')->nullable();
			$table->text('parent_heading')->nullable();
			$table->text('program_additional')->nullable();
			$table->text('video_link')->nullable();
            $table->string('program_status');
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
