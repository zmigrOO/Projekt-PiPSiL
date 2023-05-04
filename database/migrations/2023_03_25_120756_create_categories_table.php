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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->integer('parent_category_id')->nullable()->foreign()->references('id')->on('categories'); // NULL if no parent
        });
        DB::table('categories')->insert(['name' => 'Electronics', 'parent_category_id' => NULL]);
        DB::table('categories')->insert(['name' => 'Computers', 'parent_category_id' => 1]);
        DB::table('categories')->insert(['name' => 'Furniture', 'parent_category_id' => NULL]);
        DB::table('categories')->insert(['name' => 'Clothes', 'parent_category_id' => NULL]);

        DB::statement('ALTER TABLE categories AUTO_INCREMENT = 1'); // Set auto increment to 1
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cathegories');
    }
};
