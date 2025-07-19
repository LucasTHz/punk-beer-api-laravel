<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CombinationResource extends JsonResource
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
            'description' => $this->description ?? null,
            'name'        => $this->name        ?? null,
            'tagline'     => $this->tag_line    ?? null,
            'alcohol'     => $this->alcohol     ?? null,
            'amargor'     => $this->amargor     ?? null,
            'food'        => $this->food        ?? null,
            'tips'        => $this->tips        ?? null,
            'imgurl'      => $this->img_url     ?? null,
            'datebeer'    => $this->created_at  ?? null,
        ];
    }
}
