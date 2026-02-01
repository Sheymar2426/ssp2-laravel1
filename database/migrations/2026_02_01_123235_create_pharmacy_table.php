<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pharmacy', function (Blueprint $table) {
        $table->id('ProductId');
        $table->string('Name');
        $table->text('Description')->nullable();
        $table->decimal('Price', 8, 2);
        $table->integer('Stock')->default(0);
        $table->string('Image')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy');
    }
};
