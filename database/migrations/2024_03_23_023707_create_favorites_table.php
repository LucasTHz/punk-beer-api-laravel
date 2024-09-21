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
            $table->foreignId('user_id')->constrained('users');
            $table->string('fav_description', 255);
            $table->string('fav_name', 30);
            $table->string('fav_tag_line', 50);
            $table->string('fav_alcohol', 255);
            $table->integer('fav_amargor');
            $table->string('fav_food', 100);
            $table->string('fav_tips', 255);
            $table->string('fav_img_url', 255);
            $table->timestamp('fav_date_beer');
            $table->ulid('id');

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
