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
        Schema::create('fm_menu_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', array('default', 'package', 'catering'))->default('default');
            $table->decimal('price_full', 8, 2)->default(0);
            $table->decimal('price_half', 8, 2)->default(0);
            $table->integer('min_pack')->default(8);
            $table->text('info')->nullable();
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->string('thumb')->nullable();
            $table->string('cover_photo')->nullable();
            $table->integer('weight')->default(0);
            $table->boolean('in_menu')->default(1);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fm_menu_types');
    }
};
