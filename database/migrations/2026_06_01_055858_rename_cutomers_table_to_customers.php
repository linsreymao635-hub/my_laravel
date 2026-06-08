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
        if (Schema::hasTable('cutomers') && ! Schema::hasTable('customers')) {
            Schema::rename('cutomers', 'customers');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('customers') && ! Schema::hasTable('cutomers')) {
            Schema::rename('customers', 'cutomers');
        }
    }
};
