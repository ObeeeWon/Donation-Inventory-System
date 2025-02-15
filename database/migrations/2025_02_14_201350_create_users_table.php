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
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('UserName')->unique();
            $table->string('PasswordHash');
            $table->string('Role');
            $table->string('Email')->unique();
            $table->timestamp('EditeTime');  // Edit time

            $table->timestamp('CreateTime')->useCurrent();//Create time
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
