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
        Schema::table('combination_favorite', function (Blueprint $table): void {
            $table->rename('combination_favorites');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('combination_favorites', function (Blueprint $table): void {
            $table->rename('combination_favorite');
        });
    }
};
