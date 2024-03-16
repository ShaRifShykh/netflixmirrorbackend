<?php

namespace App\Livewire\Admin\Movies;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class AllMovies extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $movies = Movie::orderBy("id", "DESC")
            ->paginate(10);
        return view('livewire.admin.movies.all-movies', [
            "movies" => $movies,
        ]);
    }


    public function delete($id)
    {
        $movie = Movie::find($id);
        $movie->genres()->delete();
        $movie->delete();

        toastr()->success('Deleted Successfully!');
    }
}
