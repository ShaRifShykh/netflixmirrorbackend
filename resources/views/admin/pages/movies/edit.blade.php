@extends("admin.layout.main")
@section("title", "Edit Movie - ")

@section("main-section")
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card bs-stepper-content pt-4">
                    @livewire("admin.movies.edit-movie", ['id' => $id])
                </div>
            </div>
        </div>
        <hr class="container-m-nx mb-5">
    </div>
@endsection
