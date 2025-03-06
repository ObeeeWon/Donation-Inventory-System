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
        Schema::create('items', function (Blueprint $table) {
            $table->id('ItemID'); // Primary key for the item (auto-incremented)
            $table->string('ItemName'); // Name of the item
            $table->string('Barcode')->unique(); // Unique barcode for the item
            $table->integer('Quantity'); // Quantity of the item in stock
            $table->integer('LowStockAlert'); // Threshold for low stock alert
            $table->string('Location'); // Location where the item is stored
            $table->timestamps(); // Automatically adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
