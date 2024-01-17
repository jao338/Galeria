<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array{
        return [
            'id' => $this->id,
            'name' => $this->name,
            'path' => $this->path,
            // 'image' => route('imagem.show', ['id' => $this->id]),
        ];
    }
}

/*
    return [
            'id' => (int) $this->id,
            'name' => (string) $this->name,
        ];
*/
