<?php

namespace App\Http\Resources\Series;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "seasonNumber" => $this->season_number,
            "episodeNumber" => $this->episode_number,
            "durationMinutes" => $this->duration_minutes,
            "releaseDate" => $this->release_date,
            "thumbnailUrl" => $this->thumbnail_url,
            "url" => $this->url,
            "createdAt" => $this->created_at,
        ];
    }
}
