<?php

namespace App\Services\Favorite;

use App\Models\CombinationFavorite;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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

    public function getUserFavorites(int $idUser): Collection
    {
        return User::find($idUser)->favoriteCombinations()->with(['user:id,name'])->get();
    }
}
