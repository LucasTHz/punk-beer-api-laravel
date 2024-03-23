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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('fav_description', 255);
            $table->string('fav_name', 30);
            $table->string('fav_tag_line', 50);
            $table->string('fav_alcool', 255);
            $table->integer('fav_amargor');
            $table->string('fav_comidas', 100);
            $table->string('fav_dicas', 255);
            $table->string('fav_img_url', 255);
            $table->timestamp('fav_data_cerveja');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
