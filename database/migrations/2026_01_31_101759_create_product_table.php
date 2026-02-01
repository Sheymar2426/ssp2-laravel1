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
        Schema::create('product', function (Blueprint $table) {
    $table->id('ProductId');
    $table->string('Name');
    $table->text('Description')->nullable();
    $table->decimal('Price', 10, 2);
    $table->integer('Stock')->default(0);

    $table->unsignedBigInteger('CategoryId');
    $table->foreign('CategoryId')
          ->references('CategoryId')
          ->on('category')
          ->onDelete('cascade');

    $table->unsignedBigInteger('SubCategoryId');
    $table->foreign('SubCategoryId')
          ->references('SubcategoryId')
          ->on('subcategories')
          ->onDelete('cascade');

    $table->string('Image')->nullable(); // ✅ add this

    $table->timestamps();
});

    }
};

