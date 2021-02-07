<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateBlock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_block', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->integer('water_electricity');
            $table->integer('street_facilities');
            $table->integer('medical_services');
            $table->integer('educational_services');
            $table->integer('internet');
            $table->foreignId('block_id')->constrained('blocks')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('rate_block');
    }
}
