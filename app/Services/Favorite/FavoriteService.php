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

    /**
     * Update the favorite.
     */
    public function update(array $favoriteData, Favorite $favorite): bool
    {
        return $favorite->update($favoriteData);
    }

    /**
     * Make soft delete the favorite.
     */
    public function softDelete(Favorite $favorite): bool
    {
        return $favorite->delete();
    }

    /**
     * Force delete the favorite.
     */
    public function forceDelete(Favorite $favorite): bool
    {
        return $favorite->forceDelete();
    }
}
