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
            $table->dropForeign(['UserID']); // Remove the existing foreign key
            $table->foreign('UserID')
                  ->references('UserID')
                  ->on('users')
                  ->onDelete('cascade'); // Add cascade delete
        });
    }

    public function down()
    {
        Schema::table('inventoryLog', function (Blueprint $table) {
            $table->dropForeign(['UserID']);
            $table->foreign('UserID')
                  ->references('UserID')
                  ->on('users'); // Restore the foreign key without cascade delete
        });
    }
};
