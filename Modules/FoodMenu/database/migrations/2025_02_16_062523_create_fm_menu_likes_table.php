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
        Schema::create('fm_menu_likes', function (Blueprint $table) {
            $table->id();
            $table->enum('type', array('menu','review'))->default('menu')->comment('Liked for menu item or review comment'); 
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('review_id')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('author')->default('anonymous');
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('fm_menu_items'); 
            $table->foreign('review_id')->references('id')->on('fm_menu_reviews');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fm_menu_likes');
    }
};
