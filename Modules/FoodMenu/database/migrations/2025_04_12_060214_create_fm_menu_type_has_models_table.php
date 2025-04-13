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
        Schema::create('fm_menu_type_has_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->string('model_type')->index();
            $table->string('label')->nullable();
            $table->unsignedBigInteger('model_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('fm_menu_types'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fm_menu_type_has_models');
    }
};
