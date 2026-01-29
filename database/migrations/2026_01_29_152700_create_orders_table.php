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
       Schema::create('order', function (Blueprint $table) {
    $table->id('OrderId');
    $table->unsignedBigInteger('CustomerId');
    $table->decimal('TotalAmount', 10, 2);
    $table->string('Status')->default('Pending');
    $table->dateTime('OrderDate');

    $table->foreign('CustomerId')->references('CustomerId')->on('customer');
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
