<?php

namespace App\Http\Resources\Movie;

use App\Http\Resources\GenreResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieGenreResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "genre" => new GenreResource($this->genre),
        ];
    }
}
