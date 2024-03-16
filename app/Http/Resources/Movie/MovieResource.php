<?php

namespace App\Http\Resources\Movie;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "releaseDate" => $this->release_date->format('Y'),
            "description" => $this->description,
            "durationMinutes" => $this->duration_minutes,
            "thumbnailUrl" => $this->thumbnail_url,
            "url" => $this->url,
            "createdAt" => $this->created_at,
            "genres" => MovieGenreResource::collection($this->genres),
        ];
    }
}
