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
        Schema::create('item_desc', function (Blueprint $table) {
            $table->item_desc_id();
            $table->string('ItemName', 255); // maximum length 255
            $table->text('ItemDescription')->nullable(); // nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_desc');
    }
};
