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
        Schema::table('inventoryLog', function (Blueprint $table) {
            // Drop the incorrect foreign key if it exists
            $table->dropForeign(['ItemID']);
            $table->dropForeign(['InventoryID']);

            // Add the correct foreign key
            $table->foreign('ItemID')
                ->references('InventoryID') // Correct primary key reference
                ->on('inventory')
                ->onDelete('cascade'); // Ensures cascading delete
        });
    }

    public function down()
    {
        Schema::table('inventoryLog', function (Blueprint $table) {
            $table->dropForeign(['ItemID']);
        });
    }
};
