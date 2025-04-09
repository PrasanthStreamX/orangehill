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
        Schema::create('fm_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('item_id')->constrained();
            $table->integer('weight')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('fm_menu_types');
            $table->foreign('category_id')->references('id')->on('fm_menu_categories');
            $table->foreign('item_id')->references('id')->on('fm_menu_items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fm_menus');
    }
};
