<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie\MovieResource;
use App\Http\Resources\Series\SeriesResource;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $movies = Movie::where("title", "LIKE", "%". $request->search ."%")
            ->get();

        $series = Series::where("title", "LIKE", "%". $request->search ."%")
            ->get();

        return response()->json([
            "movies" => MovieResource::collection($movies),
            "series" => SeriesResource::collection($series),
        ]);
    }
}
