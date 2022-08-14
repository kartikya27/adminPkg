<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Kartikey\AdminCrm\Models\filters;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->id();
            $table->string('filter_value');
            $table->string('filter_type');
            $table->timestamps();
        });
		
		filters::create([
		    'filter_value' => 'Newest',
		    'filter_type' => 'sorting'
		]);
		filters::create([
		    'filter_value' => 'Price Lowest',
		    'filter_type' => 'sorting'
		]);
		filters::create([
		    'filter_value' => 'Price Highest',
		    'filter_type' => 'sorting'
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filters');
    }
}
