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
        Schema::create('orderitems', function (Blueprint $table) {
    $table->id('OrderItemId');
    $table->unsignedBigInteger('OrderId');
    $table->unsignedBigInteger('ProductId');
    $table->integer('Quantity');
    $table->decimal('Price', 10, 2);

    $table->foreign('OrderId')->references('OrderId')->on('order')->onDelete('cascade');
    $table->foreign('ProductId')->references('ProductId')->on('product');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
