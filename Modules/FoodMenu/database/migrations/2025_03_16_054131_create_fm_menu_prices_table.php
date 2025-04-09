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
        Schema::create('fm_menu_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('item_id');
            $table->string('title'); //Full/half/quarter, etc.
            $table->decimal('price', 8, 2);
            $table->boolean('weight')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('fm_menu_types'); 
            $table->foreign('item_id')->references('id')->on('fm_menu_items'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fm_menu_prices');
    }
};
