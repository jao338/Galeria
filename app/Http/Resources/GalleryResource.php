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
            'id_gallery' => $this->gallery_id,
            'name_gallery' => $this->gallery_name,
            'path' => $this->gallery_path,
            'created_at' => $this->gallery_created_at,
            'user_name' => $this->user_name,
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
