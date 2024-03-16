<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-12 card">
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Series</th>
                    <th>Title</th>
                    <th>Season</th>
                    <th>Episode</th>
                    <th>Duration</th>
                    <th>Release Date</th>
                    <th>Created on</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($episodes as $key => $episode)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $episode->series->title }}</td>
                        <td>{{ $episode->title }}</td>
                        <td>{{ $episode->season_number }}</td>
                        <td>{{ $episode->episode_number }}</td>
                        <td>{{ $episode->duration_minutes }} Mins</td>
                        <td>{{ $episode->release_date->format('M, d Y') }}</td>
                        <td>{{ $episode->created_at->format('M, d Y') }}</td>
                        <td>
                            <a href="#" wire:click="delete({{ $episode->id }})"
                               wire:confirm="Are you sure you want to delete this series?"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" style="display: flex; justify-content: space-between;">
            <div>
                {{ $episodes->links() }}
            </div>
        </div>
    </div>
</div>
