<?php

namespace App\Livewire\Admin\Series;

use App\Models\Series;
use Livewire\Component;
use Livewire\WithPagination;

class AllSeries extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $series = Series::orderBy("id", "DESC")
            ->paginate(10);

        return view('livewire.admin.series.all-series', [
            "series" => $series
        ]);
    }

    public function delete($id)
    {
        $series = Series::find($id);
        $series->genres()->delete();
        $series->episodes()->delete();
        $series->delete();

        toastr()->success('Deleted Successfully!');
    }
}
