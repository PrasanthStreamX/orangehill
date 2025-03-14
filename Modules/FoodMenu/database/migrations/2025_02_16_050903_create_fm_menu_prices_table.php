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
            $table->unsignedBigInteger('menu_id');
            $table->string('type'); //Full/half/quarter, etc.
            $table->decimal('price');
            $table->boolean('active')->default(1);
            $table->boolean('available')->default(1);
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('fm_menu_items'); 
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
