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
        Schema::create('electronics', function (Blueprint $table) {
            $table->integer('category_id')->foreign()->references('id')->on('cathegories');
            $table->integer('offer_id')->foreign()->references('id')->on('offers');
            $table->string('brand');
            $table->string('screen_size');
            $table->string('power_source');
            $table->string('weight');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electronics');
    }
};
