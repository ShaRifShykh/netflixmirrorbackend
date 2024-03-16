<?php

namespace App\Livewire\Admin\Series;

use App\Models\Series;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSeries extends Component
{
    use WithFileUploads;

    // Wire Models
    public $title;
    public $releaseDate;
    public $description;
    public $thumbnailUrl;


    public function render()
    {
        return view('livewire.admin.series.add-series');
    }

    public function addSeries()
    {
        $this->validate([
            'title' => 'required|string',
            'releaseDate' => 'required|date',
            'description' => 'required',
            'thumbnailUrl' => 'required',
        ]);

        $imageUploadFolder = "series";
        $imageUploadedPath = $this->thumbnailUrl->store($imageUploadFolder, "public");
        Storage::disk("public")->url($imageUploadedPath);

        Series::create([
            "title" => $this->title,
            "release_date" => $this->releaseDate,
            "description" => $this->description,
            "thumbnail_url" => $imageUploadedPath,
        ]);

        toastr()->success("Series added successfully!");

        return redirect()->route("admin.series.index");
    }
}
