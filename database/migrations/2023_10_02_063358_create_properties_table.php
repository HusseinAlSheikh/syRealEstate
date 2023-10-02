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
            $table->string('property_num');
            $table->integer('room');
            $table->integer('floor');
            $table->integer('price');
            $table->enum('announce_type',['OFFER' , 'WANTED']);
            $table->integer('area');
            $table->text('description');
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
