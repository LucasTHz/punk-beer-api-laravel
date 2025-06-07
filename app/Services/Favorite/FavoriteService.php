<?php

namespace App\Services\Favorite;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Validation\UnauthorizedException;

final class FavoriteService
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
    public function update(array $favoriteData, Favorite $favorite, int $userId): bool
    {
        if ($userId !== $favorite->user_id) {
            throw new UnauthorizedException("Você não tem permissão para atualizar este favorito.");
        }

        return $favorite->update($favoriteData);
    }

    /**
     * Make soft delete the favorite.
     */
    public function softDelete(Favorite $favorite, int $userId): bool
    {
        if ($userId !== $favorite->user_id) {
            throw new UnauthorizedException("Você não tem permissão para atualizar este favorito.");
        }
        return $favorite->delete();
    }

    /**
     * Force delete the favorite.
     */
    public function forceDelete(Favorite $favorite, int $userId): bool
    {
        if ($userId !== $favorite->user_id) {
            throw new UnauthorizedException("Você não tem permissão para atualizar este favorito.");
        }
        return $favorite->forceDelete();
    }
}
