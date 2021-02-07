<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('ad_categories')->onDelete('cascade');
            $table->float('price', 20, 2);
            $table->foreignId('block_id')->constrained('blocks')->onDelete('cascade');
            $table->float('area', 10, 2);
            $table->longText('description');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->enum('purpose', ['commercial', 'living', null])->nullable();
            // $table->string('interface')->nullable();
            // $table->integer('bed_room')->nullable();
            // $table->integer('living_room')->nullable();
            // $table->integer('bath_room')->nullable();
            // $table->integer('Lounges')->nullable();
            // $table->integer('property_age')->nullable();
            // $table->integer('floor')->nullable();
            // $table->integer('apartments')->nullable();
            $table->integer('view_count')->nullable();
            $table->integer('report_count')->nullable();
            $table->boolean('visible')->default(true);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('advertisments');
    }
}
