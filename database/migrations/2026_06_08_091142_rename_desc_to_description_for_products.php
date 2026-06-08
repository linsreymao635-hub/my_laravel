<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('products', 'desc') && ! Schema::hasColumn('products', 'description')) {
            Schema::table('products', function (Blueprint $table) {
                $table->renameColumn('desc', 'description');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('products', 'description') && ! Schema::hasColumn('products', 'desc')) {
            Schema::table('products', function (Blueprint $table) {
                $table->renameColumn('description', 'desc');
            });
        }
    }
};
