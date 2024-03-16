<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        return view("admin.pages.movies.index");
    }


    public function create(Request $request)
    {
        return view("admin.pages.movies.add");
    }


    public function insert(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'releaseDate' => 'required|date',
            'description' => 'required',
            'durationInMinutes' => 'required|numeric',
            'thumbnailUrl' => 'required',
            'url' => 'required',
        ]);

        $imageUploadFolder = "movies";
        $imageUploadedPath = $request->file('thumbnailUrl')->store($imageUploadFolder, "public");
        Storage::disk("public")->url($imageUploadedPath);

        $videoUploadFolder = "movies/video";
        $videoUploadedPath = $request->file('url')->store($videoUploadFolder, "public");
        Storage::disk("public")->url($videoUploadedPath);

        Movie::create([
            "title" => $request->title,
            "release_date" => $request->releaseDate,
            "description" => $request->description,
            "duration_minutes" => $request->durationInMinutes,
            "thumbnail_url" => $imageUploadedPath,
            "url" => $videoUploadedPath,
        ]);

        toastr()->success("Movie added successfully!");

        return redirect()->route("admin.movies.index");
    }


    public function edit(Request $request, $id)
    {
        return view("admin.pages.movies.edit", [
            "id" => $id
        ]);
    }
}
