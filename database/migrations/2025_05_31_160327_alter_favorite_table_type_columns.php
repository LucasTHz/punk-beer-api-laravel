<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('favorites', function (Blueprint $table): void {
            $table->dropColumn('fav_date_beer');
            $table->renameColumn('fav_description', 'description');
            $table->renameColumn('fav_name', 'name');
            $table->renameColumn('fav_tag_line', 'tag_line');
            $table->renameColumn('fav_alcohol', 'alcohol');
            $table->renameColumn('fav_amargor', 'amargor');
            $table->renameColumn('fav_food', 'food');
            $table->renameColumn('fav_tips', 'tips');
            $table->renameColumn('fav_img_url', 'img_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('favorites', function (Blueprint $table): void {
            $table->dropColumn('id');
        });
    }
};
