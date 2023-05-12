<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->foreign()->references('id')->on('categories');
            $table->string('name');
            $table->integer('quantity');
            $table->string('condition');
            $table->float('price');
            $table->string('description');
            $table->string('phone_number');
            $table->string('city');
            $table->string('image_path');
            $table->integer('seller_id')->foreign()->references('id')->on('users');
            $table->boolean('active')->default(true);
            $table->timestamp('offer_creation_date');
            $table->timestamp('offer_expiration_date')->default(DB::raw('DATE_ADD(offer_creation_date, INTERVAL 30 DAY)'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
