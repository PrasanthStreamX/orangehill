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
        Schema::create('fm_menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->decimal('price')->default(0);
            $table->string('thumb')->nullable();
            $table->string('cover_photo')->nullable();
            $table->text('info')->nullable();
            $table->text('description')->nullable();
            $table->integer('weight')->default(0);
            $table->boolean('active')->default(1);
            $table->boolean('available')->default(1);
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fm_menu_items');
    }
};
