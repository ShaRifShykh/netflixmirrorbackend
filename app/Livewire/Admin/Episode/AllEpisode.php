<?php

namespace App\Livewire\Admin\Episode;

use App\Models\Episode;
use Livewire\Component;
use Livewire\WithPagination;

class AllEpisode extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $episodes = Episode::orderBy("id", "DESC")
            ->paginate(10);

        return view('livewire.admin.episode.all-episode', [
            "episodes" => $episodes,
        ]);
    }

    public function delete($id)
    {
        $episode = Episode::find($id);
        $episode->delete();

        toastr()->success('Deleted Successfully!');
    }
}
