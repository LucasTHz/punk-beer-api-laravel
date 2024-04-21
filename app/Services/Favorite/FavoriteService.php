<?php

namespace App\Services\Favorite;

use App\Models\Favorite;

class FavoriteService
{
    /**
     * Create a favorite for the user.
     */
    public function store(array $favoriteData, int $userId): Favorite
    {
        $favoriteData['user_id'] = $userId;

        return Favorite::create($favoriteData);
    }
}
