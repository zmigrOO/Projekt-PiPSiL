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
        Schema::create('cathegories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('parent_cathegory_id')->nullable()->foreign()->references('id')->on('cathegories'); // NULL if no parent
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cathegories');
    }
};
