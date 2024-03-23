<?php

use App\Models\Favorite;

class FavoriteService
{
    public function store(FavoriteDTO $dto)
    {
        $user_id = auth()->id();
        return Favorite::create([
            'user_id' => $user_id,
            'fav_description' => $dto->favoriteDescription,
            'fav_name' => $dto->favoriteName,
            'fav_tagline' => $dto->favoriteTagLine,
            'fav_alcohol' => $dto->favoriteAlcohol,
            'fav_amargor' => $dto->favoriteAmargor,
            'fav_food' => $dto->favoriteFood,
            'fav_tips' => $dto->favoriteTips,
            'fav_img_url' => $dto->favoriteImgUrl,
            'fav_date_beer' => $dto->favoriteDateBeer,
        ]);
    }
}
