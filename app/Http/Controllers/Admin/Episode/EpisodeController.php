<?php

namespace App\Http\Controllers\Admin\Episode;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    public function index(Request $request)
    {
        return view("admin.pages.episodes.index");
    }


    public function create(Request $request)
    {
        $series = Series::all();

        return view("admin.pages.episodes.add", [
            "series" => $series,
        ]);
    }


    public function insert(Request $request)
    {
        $request->validate([
            'seriesId' => 'required|numeric',
            'title' => 'required|string',
            'description' => 'required',
            'seasonNumber' => 'required|numeric',
            'episodeNumber' => 'required|numeric',
            'durationInMinutes' => 'required|numeric',
            'releaseDate' => 'required|date',
            'thumbnailUrl' => 'required',
            'url' => 'required',
        ]);

        $imageUploadFolder = "series/episodes";
        $imageUploadedPath = $request->file('thumbnailUrl')->store($imageUploadFolder, "public");
        Storage::disk("public")->url($imageUploadedPath);

        $videoUploadFolder = "series/episodes/video";
        $videoUploadedPath = $request->file('url')->store($videoUploadFolder, "public");
        Storage::disk("public")->url($videoUploadedPath);

        Episode::create([
            "series_id" => $request->seriesId,
            "title" => $request->title,
            "description" => $request->description,
            "season_number" => $request->seasonNumber,
            "episode_number" => $request->episodeNumber,
            "duration_minutes" => $request->durationInMinutes,
            "release_date" => $request->releaseDate,
            "thumbnail_url" => $imageUploadedPath,
            "url" => $videoUploadedPath,
        ]);

        toastr()->success("Episode added successfully!");

        return redirect()->route("admin.episodes.index");
    }


    public function edit(Request $request, $id)
    {
        return view("admin.pages.episodes.edit", [
            "id" => $id
        ]);
    }
}
