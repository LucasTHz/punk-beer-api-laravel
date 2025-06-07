<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class FavoriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                  => $this->ulid          ?? null,
            'favoriteDescription' => $this->description ?? null,
            'favoriteName'        => $this->name        ?? null,
            'favoriteTagLine'     => $this->tag_line    ?? null,
            'favoriteAlcohol'     => $this->alcohol     ?? null,
            'favoriteAmargor'     => $this->amargor     ?? null,
            'favoriteFood'        => $this->food        ?? null,
            'favoriteTips'        => $this->tips        ?? null,
            'favoriteImgUrl'      => $this->img_url     ?? null,
            'favoriteDateBeer'    => $this->created_at  ?? null,
        ];
    }
}
