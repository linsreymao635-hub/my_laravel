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
        if (Schema::hasColumn('categories', 'desc') && ! Schema::hasColumn('categories', 'description')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->renameColumn('desc', 'description');
            });
        }

        if (Schema::hasColumn('movies', 'desc') && ! Schema::hasColumn('movies', 'description')) {
            Schema::table('movies', function (Blueprint $table) {
                $table->renameColumn('desc', 'description');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('categories', 'description') && ! Schema::hasColumn('categories', 'desc')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->renameColumn('description', 'desc');
            });
        }

        if (Schema::hasColumn('movies', 'description') && ! Schema::hasColumn('movies', 'desc')) {
            Schema::table('movies', function (Blueprint $table) {
                $table->renameColumn('description', 'desc');
            });
        }
    }
};
