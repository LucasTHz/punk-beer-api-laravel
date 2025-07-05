<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ulid'        => $this->ulid,
            'name'        => $this->name,
            'email'       => $this->email,
            'dateOfBirth' => $this->date_of_birth,
            'document'    => $this->document_id,
        ];
    }
}
