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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page_url');
            $table->string('bannerImg')->nullable();
            $table->string('heading');
            $table->string('subheading')->nullable();
            $table->string('description');
            $table->string('heading1')->nullable();
            $table->string('subheading1')->nullable();
            $table->string('description1')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('menu')->nullable();
            $table->string('status')->nullable();
            $table->string('meta_heading')->nullable();
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
        Schema::dropIfExists('page_contents');
    }
};
