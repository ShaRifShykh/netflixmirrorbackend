<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-12 card">
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Release Date</th>
                    <th>Created on</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($series as $key => $serie)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $serie->title }}</td>
                        <td>{{ $serie->release_date->format('M, d Y') }}</td>
                        <td>{{ $serie->created_at->format('M, d Y') }}</td>
                        <td>
                            <a href="#" wire:click="delete({{ $serie->id }})"
                               wire:confirm="Are you sure you want to delete this series?"
                               class="btn btn-danger">Delete</a>

{{--                            <a href="{{ route("admin.series.edit", ["id" => $serie->id]) }}"--}}
{{--                               class="btn btn-success">Edit</a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" style="display: flex; justify-content: space-between;">
            <div>
                {{ $series->links() }}
            </div>
        </div>
    </div>
</div>
