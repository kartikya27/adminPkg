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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('pincode')->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('aadharNo')->nullable();
            $table->string('panNo')->nullable();
            $table->integer('subscription')->default(0);
            $table->string('referalCode')->nullable();
            $table->string('referredBy')->nullable();
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
        Schema::dropIfExists('user_details');
    }
};
