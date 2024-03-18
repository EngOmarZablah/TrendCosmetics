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
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->foreign('region_id')->constrained();
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('township_id')->references('id')->on('townships');
            $table->string('street');
            $table->tinyInteger('accountType');
            $table->tinyInteger('status');
            $table->integer('verifyCode');
            $table->timestamps();
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