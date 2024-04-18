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
            'id'                  => $this->id,
            'favoriteDescription' => $this->fav_description,
            'favoriteName'        => $this->fav_name,
            'favoriteTagLine'     => $this->fav_tag_line,
            'favoriteAlcohol'     => $this->fav_alcohol,
            'favoriteAmargor'     => $this->fav_amargor,
            'favoriteFood'        => $this->fav_food,
            'favoriteTips'        => $this->fav_tips,
            'favoriteImgUrl'      => $this->fav_img_url,
            'favoriteDateBeer'    => $this->fav_date_beer,
        ];
    }
}
