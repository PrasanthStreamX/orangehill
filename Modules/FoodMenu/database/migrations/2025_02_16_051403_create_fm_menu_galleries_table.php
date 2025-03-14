<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fm_menu_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->string('media');
            $table->enum('media_type', array('image','video','document'))->default('image');
            $table->enum('storage', array('local','s3'))->default('local');
            $table->string('title')->nullable();
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('fm_menu_items'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fm_menu_galleries');
    }
};
