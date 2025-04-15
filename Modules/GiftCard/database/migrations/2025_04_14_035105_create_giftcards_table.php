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
        Schema::create('giftcards', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 8, 2);
            $table->enum('collection_method', array('mail','direct'))->default('mail');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('party_name')->nullable();
            $table->string('party_email')->nullable();
            $table->string('party_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giftcards');
    }
};
