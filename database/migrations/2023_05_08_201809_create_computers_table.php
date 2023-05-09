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
        Schema::create('computers', function (Blueprint $table) {
            $table->integer('category_id')->foreign()->references('id')->on('cathegories');
            $table->integer('offer_id')->foreign()->references('id')->on('offers');
            $table->string('processor');
            $table->string('hard_drive');
            $table->string('RAM_type');
            $table->string('graphics_card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
