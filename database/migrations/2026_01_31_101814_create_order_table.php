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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderId');

            // Foreign key that matches the customer table primary key
            $table->unsignedBigInteger('CustomerId');
            $table->foreign('CustomerId')
                  ->references('CustomerId')  // matches PK in customer table
                  ->on('customer')            // table name must match exactly
                  ->onDelete('cascade');

            $table->decimal('TotalAmount', 10, 2);
            $table->string('Status')->default('Pending');
            $table->dateTime('OrderDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
