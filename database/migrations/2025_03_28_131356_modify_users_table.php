<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['Location']); // Remove UNIQUE constraint
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unique('Location'); // Re-add UNIQUE constraint if needed
        });
    }
};
