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
        Schema::table('notifications', function (Blueprint $table) {
            // Drop the incorrect foreign key if it exists
            $table->dropForeign(['ItemID']); 

            // Add the correct foreign key reference
            $table->foreign('ItemID')
                ->references('InventoryID') // Correct primary key reference
                ->on('inventory')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['ItemID']);
        });
    }
};
