<?php
namespace App\Services\Favorite;

use App\Models\CombinationFavorite;

final class FavoriteService
{
    public function __construct(private CombinationFavorite $combinationFavorite = new CombinationFavorite()) {}
    public function addToFavorites(int $idCombination, int $user): void
    {
        $this->combinationFavorite->create([
            'user_id'        => $user,
            'combination_id' => $idCombination,
        ]);
    }

    public function removeFromFavorites(int $idCombination, $user): void
    {
        $this->combinationFavorite->where('user_id', $user)
            ->where('combination_id', $idCombination)
            ->delete();
    }
}
