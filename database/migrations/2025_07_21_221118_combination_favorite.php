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
        Schema::create('combination_favorite', function (Blueprint $table): void {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('combination_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'combination_id']); // Evita likes duplicados
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('combination_favorite', function (Blueprint $table): void {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['combination_id']);
            $table->dropColumn(['user_id', 'combination_id', 'created_at', 'updated_at']);
        });
        Schema::dropIfExists('combination_favorite');
    }
};
