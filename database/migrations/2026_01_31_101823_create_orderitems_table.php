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

            // Foreign key to orders table
            $table->unsignedBigInteger('OrderId');
            $table->foreign('OrderId')
                  ->references('OrderId')   // matches primary key in orders table
                  ->on('orders')           // table name must match
                  ->onDelete('cascade');

            // Foreign key to product table
            $table->unsignedBigInteger('ProductId');
            $table->foreign('ProductId')
                  ->references('ProductId') // matches primary key in product table
                  ->on('product')           // table name must match
                  ->onDelete('cascade');

            $table->integer('Quantity');
            $table->decimal('Price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
