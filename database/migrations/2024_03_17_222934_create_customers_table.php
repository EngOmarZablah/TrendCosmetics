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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->foreignId('region_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('township_id')->constrained();
            $table->string('street');
            $table->tinyInteger('accountType');
            $table->tinyInteger('status');
            $table->integer('verifyCode');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};