<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add 'Barcode' field to 'item_desc' table
        Schema::table('item_desc', function (Blueprint $table) {
            $table->string('Barcode')->nullable(); // Add Barcode column to 'item_desc' table
        });

        // Remove 'Barcode' field from 'items' table
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('Barcode'); // Drop Barcode column from 'items' table
        });
    }

    public function down(): void
    {
        // In case of rollback, remove 'Barcode' from 'item_desc' table
        Schema::table('item_desc', function (Blueprint $table) {
            $table->dropColumn('Barcode'); // Drop Barcode column from 'item_desc' table
        });

        // Restore 'Barcode' column to 'items' table if rollback occurs
        Schema::table('items', function (Blueprint $table) {
            $table->string('Barcode'); // Restore Barcode column to 'items' table
        });
    }
};
