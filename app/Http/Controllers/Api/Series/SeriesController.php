<?php

namespace App\Http\Controllers\Api\Series;

use App\Http\Controllers\Controller;
use App\Http\Resources\Series\SeriesResource;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function topSeries()
    {
        $series = Series::inRandomOrder()
            ->limit(10)
            ->get();

        return response([
            "data" => SeriesResource::collection($series)
        ]);
    }


    public function randomSeries()
    {
        $series = Series::inRandomOrder()
            ->limit(20)
            ->get();

        return response([
            "data" => SeriesResource::collection($series)
        ]);
    }
}
