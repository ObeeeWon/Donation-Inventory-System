<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('ItemID'); // Primary key
            $table->string('ItemName');
            $table->string('Barcode')->unique();
            $table->integer('Quantity');
            $table->integer('LowStockAlert');
            $table->string('Location');

            // Foreign keys
            $table->unsignedBigInteger('item_location_id')->nullable();
            $table->foreign('item_location_id')->references('id')->on('item_location')->onDelete('set null');

            $table->unsignedBigInteger('item_desc_id')->nullable();
            $table->foreign('item_desc_id')->references('id')->on('item_desc')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['item_location_id']);
            $table->dropForeign(['item_desc_id']);

            $table->dropColumn(['item_location_id', 'item_desc_id']);
        });

        Schema::dropIfExists('items');
    }
};
