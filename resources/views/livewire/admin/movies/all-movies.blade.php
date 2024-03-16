<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-12 card">
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Release Date</th>
                    <th>Duration</th>
                    <th>Created on</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($movies as $key => $movie)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->release_date->format('M, d Y') }}</td>
                        <td>{{ $movie->duration_minutes }} Mins</td>
                        <td>{{ $movie->created_at->format('M, d Y') }}</td>
                        <td>
                            <a href="#" wire:click="delete({{ $movie->id }})"
                               wire:confirm="Are you sure you want to delete this movie?"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" style="display: flex; justify-content: space-between;">
            <div>
                {{ $movies->links() }}
            </div>
        </div>
    </div>
</div>
