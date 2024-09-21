<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'favoriteDescription' => $this->fav_description ?? null,
            'favoriteName' => $this->fav_name ?? null,
            'favoriteTagLine' => $this->fav_tag_line ?? null,
            'favoriteAlcohol' => $this->fav_alcohol ?? null,
            'favoriteAmargor' => $this->fav_amargor ?? null,
            'favoriteFood' => $this->fav_food ?? null,
            'favoriteTips' => $this->fav_tips ?? null,
            'favoriteImgUrl' => $this->fav_img_url ?? null,
            'favoriteDateBeer' => $this->fav_date_beer ?? null,
        ];
    }
}
