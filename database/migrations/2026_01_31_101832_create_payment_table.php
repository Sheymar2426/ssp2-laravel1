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
        Schema::create('payment', function (Blueprint $table) {
            $table->id('PaymentId');

            // Foreign key to orders table
            $table->unsignedBigInteger('OrderId');
            $table->foreign('OrderId')
                  ->references('OrderId') // matches primary key in orders table
                  ->on('orders')          // table name must match
                  ->onDelete('cascade');

            $table->string('PaymentMethod');
            $table->decimal('Amount', 10, 2);
            $table->string('Status')->default('Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
