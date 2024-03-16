<?php

namespace App\Http\Controllers\Api\Series;

use App\Http\Controllers\Controller;
use App\Http\Resources\Series\EpisodeResource;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function getEpisodes(Request $request, $id)
    {
        $episodes = Episode::where('series_id', $id)
            ->orderBy('season_number', 'ASC')
            ->orderBy('episode_number', 'ASC')
            ->get();

        return response([
            "data" => EpisodeResource::collection($episodes)
        ], 200);
    }
}
