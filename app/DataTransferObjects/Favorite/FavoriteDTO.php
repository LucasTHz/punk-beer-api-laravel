<?php

namespace App\DataTransferObjects\Favorite;
use Illuminate\Http\Request;

readonly class FavoriteDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $favoriteName,
        public readonly string $favoriteDescription,
        public readonly string $favoriteTagLine,
        public readonly string $favoriteAlcohol,
        public readonly string $favoriteAmargor,
        public readonly string $favoriteFood,
        public readonly string $favoriteTips,
        public readonly string $favoriteImgUrl,
        public readonly string $favoriteDateBeer,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            id: $request->validated('id'),
            favoriteName: $request->validated('favoriteName'),
            favoriteDescription: $request->validated('favoriteDescription'),
            favoriteTagLine: $request->validated('favoriteTagLine'),
            favoriteAlcohol: $request->validated('favoriteAlcohol'),
            favoriteAmargor: $request->validated('favoriteAmargor'),
            favoriteFood: $request->validated('favoriteFood'),
            favoriteTips: $request->validated('favoriteTips'),
            favoriteImgUrl: $request->validated('favoriteImgUrl'),
            favoriteDateBeer: $request->validated('favoriteDateBeer'),
        );
    }
}
