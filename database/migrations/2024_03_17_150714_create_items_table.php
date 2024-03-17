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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string('description')->nullable();
            $table->string('img');
            $table->float('originalPrice');
            $table->float('dealerPrice')->nullable();
            $table->integer('subCatagory_id');
            $table->tinyInteger('hidden');
            $table->tinyInteger('available');
            $table->string('status');






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
