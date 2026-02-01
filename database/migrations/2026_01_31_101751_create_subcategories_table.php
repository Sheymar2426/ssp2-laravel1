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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id('SubcategoryId');
            $table->string('SubcategoryName');

            // Make sure the foreign key matches the parent table column and type
            $table->unsignedBigInteger('CategoryId');

            $table->foreign('CategoryId')
                  ->references('CategoryId')  // Primary key in 'category' table
                  ->on('category')            // Table name must match exactly
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
