<?php

namespace App\Services\Combination;

use App\Models\Combination;
use App\Models\User;
use Illuminate\Validation\UnauthorizedException;

final class CombinationService
{
    /**
     * Create a combination for the user.
     */
    public function store(array $data, int $userId): Combination
    {
        $data['user_id'] = $userId;

        return Combination::create($data);
    }

    /**
     * Update the combination.
     */
    public function update(array $data, Combination $combination, int $userId): bool
    {
        if ($userId !== $combination->user_id) {
            throw new UnauthorizedException("Você não tem permissão para atualizar este favorito.");
        }

        return $combination->update($data);
    }

    /**
     * Make soft delete the combination.
     */
    public function softDelete(Combination $combination, int $userId): bool
    {
        if ($userId !== $combination->user_id) {
            throw new UnauthorizedException("Você não tem permissão para atualizar este favorito.");
        }
        return $combination->delete();
    }

    /**
     * Force delete the combination.
     */
    public function forceDelete(Combination $combination, int $userId): bool
    {
        if ($userId !== $combination->user_id) {
            throw new UnauthorizedException("Você não tem permissão para atualizar este favorito.");
        }
        return $combination->forceDelete();
    }
}
