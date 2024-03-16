<?php

namespace App\Livewire\Admin\Movies;

use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddMovie extends Component
{
    use WithFileUploads;

    // Wire Models
    public $title;
    public $releaseDate;
    public $description;
    public $durationInMinutes;
    public $thumbnailUrl;
    public $url;


    public function render()
    {
        return view('livewire.admin.movies.add-movie');
    }

    public function addMovie()
    {
        $this->validate([
            'title' => 'required|string',
            'releaseDate' => 'required|date',
            'description' => 'required',
            'durationInMinutes' => 'required|numeric',
            'thumbnailUrl' => 'required',
            'url' => 'required',
        ]);

        $imageUploadFolder = "movies";
        $imageUploadedPath = $this->thumbnailUrl->store($imageUploadFolder, "public");
        Storage::disk("public")->url($imageUploadedPath);

        $videoUploadFolder = "movies/video";
        $videoUploadedPath = $this->thumbnailUrl->store($videoUploadFolder, "public");
        Storage::disk("public")->url($videoUploadedPath);

        Movie::create([
            "title" => $this->title,
            "release_date" => $this->releaseDate,
            "description" => $this->description,
            "duration_minutes" => $this->durationInMinutes,
            "thumbnail_url" => $imageUploadedPath,
            "url" => $videoUploadedPath,
        ]);

        toastr()->success("Movie added successfully!");

        return redirect()->route("admin.movies.index");
    }
}
