@extends("admin.layout.main")
@section("title", "Add a Movie - ")

@section("main-section")
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card bs-stepper-content pt-4">
                    <form action="{{ route("admin.movies.insert") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Survey Details -->
                        <div id="survey-details" class="content px-3 pb-5">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Movie</h6>
                                <small>Enter Movie Details.</small>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input class="form-control" type="text" id="title"
                                           name="title">
                                    @error('title') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="releaseDate">Release Date</label>
                                    <input type="date" id="releaseDate" class="form-control"
                                           name="releaseDate" />
                                    @error('releaseDate') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-sm-12">
                                    <label class="form-label" for="durationInMinutes">Duration (in minutes)</label>
                                    <input type="number" id="durationInMinutes" class="form-control"
                                           name="durationInMinutes" />
                                    @error('durationInMinutes') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label class="form-label" for="url">Url</label>
                                    <input type="file" id="url" class="form-control" accept="video/*"
                                           name="url" />
                                    @error('url') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-sm-12">
                                    <label for="thumbnailUrl" class="form-label">Select Thumbnail</label>
                                    <input class="form-control" type="file" id="thumbnailUrl"
                                           name="thumbnailUrl" accept="image/*">
                                    @error('thumbnailUrl') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-sm-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"
                                              maxlength="300" rows="4"></textarea>
                                    @error('description') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="container-m-nx mb-5">
    </div>
@endsection
