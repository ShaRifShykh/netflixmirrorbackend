<?php

namespace App\Http\Resources\Series;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "releaseDate" => $this->release_date->format('Y'),
            "description" => $this->description,
            "thumbnailUrl" => $this->thumbnail_url,
            "createdAt" => $this->created_at,
            "genres" => SeriesGenreResource::collection($this->genres),
        ];
    }
}
