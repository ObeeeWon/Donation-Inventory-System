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
        Schema::create('inventoryLog', function (Blueprint $table) {
            $table->id('LogId'); // Primary key for the log (auto-incremented)
            $table->foreignId('UserID')->constrained('users'); // Foreign key to 'users' table (assuming 'users' table exists)
            $table->foreignId('ItemID')->constrained('inventory'); // Foreign key to 'inventory' table (assuming 'inventory' table exists)
            $table->string('Barcode_old'); // Old barcode value before change
            $table->string('Barcode_new'); // New barcode value after change
            $table->integer('Quantity_old'); // Old quantity value before change
            $table->integer('Quantity_new'); // New quantity value after change
            $table->integer('LowStockAlert_old'); // Old low stock alert threshold before change
            $table->integer('LowStockAlert_new'); // New low stock alert threshold after change
            $table->string('Location_old'); // Old location value before change
            $table->string('Location_new'); // New location value after change
            $table->timestamp('OperationTime_old'); // Old operation time
            $table->timestamp('OperationTime_new'); // New operation time
            $table->timestamp('OperationTime')->useCurrent(); // Timestamp of the operation (current date and time)

            $table->timestamps(); // Automatically adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventoryLog');
    }
};
