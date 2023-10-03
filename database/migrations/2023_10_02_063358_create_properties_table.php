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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('neighbourhood_id');
            $table->unsignedBigInteger('bokerage_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('announce_type_id');
            $table->string('property_num');
            $table->integer('room');
            $table->integer('floor');
            $table->integer('price');
            $table->integer('area');
            $table->text('description');
            $table->boolean('is_done')->default(false);
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('neighbourhood_id')->references('id')->on('neighbourhoods')->onDelete('cascade');
            $table->foreign('bokerage_id')->references('id')->on('bokerages')->onDelete('cascade');
            $table->foreign('announce_type_id')->references('id')->on('announce_types')->onDelete('cascade');
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
        Schema::dropIfExists('properties');
    }
};
