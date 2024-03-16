<form wire:submit.prevent="addSeries">
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
                       wire:model="title">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="releaseDate">Release Date</label>
                <input type="date" id="releaseDate" class="form-control"
                       wire:model="releaseDate" />
                @error('releaseDate') <span class="error">{{ $message }}</span> @enderror
            </div>


            <div class="col-sm-12">
                <label for="thumbnailUrl" class="form-label">Select Thumbnail</label>
                <input class="form-control" type="file" id="thumbnailUrl"
                       wire:model="thumbnailUrl" accept="image/*">
                @error('thumbnailUrl') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-sm-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" wire:model="description"
                          maxlength="300" rows="4"></textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-12 d-flex justify-content-between">
                <button type="submit" class="btn btn-success btn-submit">Submit</button>
            </div>
        </div>
    </div>
</form>


