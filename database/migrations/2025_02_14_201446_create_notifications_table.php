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
        Schema::create('notifications', function (Blueprint $table) {
            // Primary Key
            $table->id('NotificationID');  // NotificationID as Primary Key
            $table->foreignId('UserID')->constrained('users'); // Restrict delete on UserID
            $table->foreignId('ItemID')->constrained('inventory'); // Restrict delete on ItemID

            // Additional fields for the notification
            $table->string('ItemName');   // Name of the item
            $table->text('Message');      // Notification message
            $table->enum('Status', ['lowStock', 'normal']); // Status of notification (low stock or normal)
            $table->timestamp('CreateTime')->useCurrent();  // Timestamp for when the notification is created
            $table->boolean('IsRead')->default(false);  // Whether the notification has been read or not

            $table->timestamps();  // Automatically adds 'created_at' and 'updated_at' columns
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
