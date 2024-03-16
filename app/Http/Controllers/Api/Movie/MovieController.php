<?php

namespace App\Http\Controllers\Api\Movie;

use App\Http\Controllers\Controller;
use App\Http\Resources\Movie\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function trendingMovies()
    {
        $movies = Movie::inRandomOrder()
            ->limit(3)
            ->get();

        return response([
            "data" => MovieResource::collection($movies)
        ]);
    }


    public function topMovies()
    {
        $movies = Movie::inRandomOrder()
            ->limit(10)
            ->get();

        return response([
            "data" => MovieResource::collection($movies)
        ]);
    }


    public function randomMovies()
    {
        $movies = Movie::inRandomOrder()
            ->limit(20)
            ->get();

        return response([
            "data" => MovieResource::collection($movies)
        ]);
    }
}
