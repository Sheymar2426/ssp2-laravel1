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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewId');

            // Foreign key to product table
            $table->unsignedBigInteger('ProductId');
            $table->foreign('ProductId')
                  ->references('ProductId') // matches PK in product table
                  ->on('product')
                  ->onDelete('cascade');

            // Foreign key to customer table
            $table->unsignedBigInteger('CustomerId');
            $table->foreign('CustomerId')
                  ->references('CustomerId') // matches PK in customer table
                  ->on('customer')
                  ->onDelete('cascade');

            $table->integer('Rating');
            $table->text('Comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
