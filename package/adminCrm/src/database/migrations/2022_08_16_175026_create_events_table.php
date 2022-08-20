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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('eventName')>nullable();
            $table->text('venue')>nullable();
            $table->date('date')>nullable();
            $table->text('shortContent')>nullable();
            $table->text('content')>nullable();
            $table->string('desktopImg')>nullable();
            $table->string('mobileImg')>nullable();
            $table->string('type')>nullable();
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
        Schema::dropIfExists('events');
    }
};
