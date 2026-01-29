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
    $table->unsignedBigInteger('ProductId');
    $table->unsignedBigInteger('CustomerId');
    $table->integer('Rating');
    $table->text('Comment')->nullable();

    $table->foreign('ProductId')->references('ProductId')->on('product')->onDelete('cascade');
    $table->foreign('CustomerId')->references('CustomerId')->on('customer')->onDelete('cascade');
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
