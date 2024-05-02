<?php

namespace App\Services\Favorite;

use App\Models\Favorite;

class FavoriteService
{
    /**
     * Create a favorite for the user.
     * @param array $favoriteData
     * @param int $userId
     * @return Favorite
     */
    public function store(array $favoriteData, int $userId): Favorite
    {
        $favoriteData['user_id'] = $userId;

        return Favorite::create($favoriteData);
    }

    /**
     * Update the favorite.
     * @param array $favoriteData
     * @param Favorite $favorite
     * @return bool
     */
    public function update(array $favoriteData, Favorite $favorite): bool
    {
        return $favorite->update($favoriteData);
    }

    /**
     * Make soft delete the favorite.
     * @param Favorite $favorite
     * @return bool
     */

    public function softDelete(Favorite $favorite): bool
    {
        return $favorite->delete();
    }

    /**
     * Force delete the favorite.
     * @param Favorite $favorite
     * @return bool
     */
    public function forceDelete(Favorite $favorite): bool
    {
        return $favorite->forceDelete();
    }
}
