<?php

namespace App\Livewire\Admin\Episode;

use App\Models\Episode;
use App\Models\Series;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddEpisode extends Component
{
    use WithFileUploads;

    // Wire Models
    public $seriesId;
    public $title;
    public $description;
    public $seasonNumber;
    public $episodeNumber;
    public $durationInMinutes;
    public $releaseDate;
    public $thumbnailUrl;
    public $url;

    public function render()
    {
        $series = Series::all();
        return view('livewire.admin.episode.add-episode', [
            "series" => $series,
        ]);
    }

    public function addSeries()
    {
        $this->validate([
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
        $imageUploadedPath = $this->thumbnailUrl->store($imageUploadFolder, "public");
        Storage::disk("public")->url($imageUploadedPath);

        $videoUploadFolder = "series/episodes/video";
        $videoUploadedPath = $this->url->store($videoUploadFolder, "public");
        Storage::disk("public")->url($videoUploadedPath);

        Episode::create([
            "series_id" => $this->seriesId,
            "title" => $this->title,
            "description" => $this->description,
            "season_number" => $this->seasonNumber,
            "episode_number" => $this->episodeNumber,
            "duration_minutes" => $this->durationInMinutes,
            "release_date" => $this->releaseDate,
            "thumbnail_url" => $imageUploadedPath,
            "url" => $videoUploadedPath,
        ]);

        toastr()->success("Episode added successfully!");

        return redirect()->route("admin.episodes.index");
    }
}
