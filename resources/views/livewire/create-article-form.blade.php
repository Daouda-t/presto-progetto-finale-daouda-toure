<form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit.prevent="save">

    <div class="mb-3">
        <label for="title" class="form-label">Titolo:</label>
        <input
            type="text"
            id="title"
            class="form-control @error('title') is-invalid @enderror"
            wire:model.blur="title"
        >
        @error('title')
            <p class="fst-italic text-danger mb-0">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione:</label>
        <textarea
            id="description"
            cols="30"
            rows="10"
            class="form-control @error('description') is-invalid @enderror"
            wire:model.blur="description"
        ></textarea>
        @error('description')
            <p class="fst-italic text-danger mb-0">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Prezzo:</label>
        <input
            type="text"
            id="price"
            class="form-control @error('price') is-invalid @enderror"
            wire:model.blur="price"
        >
        @error('price')
            <p class="fst-italic text-danger mb-0">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Categoria:</label>
        <select
            id="category_id"
            wire:model="category_id"
            class="form-select @error('category_id') is-invalid @enderror"
        >
            <option value="" selected disabled>Seleziona una categoria</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="fst-italic text-danger mb-0">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="temporary_images" class="form-label">Immagini:</label>
        <input
            type="file"
            id="temporary_images"
            wire:model.live="temporary_images"
            multiple
            class="form-control @error('temporary_images.*') is-invalid @enderror"
        >

        @error('temporary_images')
            <p class="fst-italic text-danger mb-0">{{ $message }}</p>
        @enderror

        @error('temporary_images.*')
            <p class="fst-italic text-danger mb-0">{{ $message }}</p>
        @enderror
    </div>

    @if (!empty($images))
        <div class="mb-3">
            <p>Photo preview:</p>
            <div class="row border border-4 border-success rounded shadow py-4">
                @foreach ($images as $key => $image)
                    <div class="col-12 col-md-4 d-flex flex-column align-items-center my-3">
                        <div
                            class="img-preview mx-auto shadow rounded"
                            style="background-image: url('{{ $image->temporaryUrl() }}');"
                        ></div>

                        <button
                            type="button"
                            class="btn btn-danger mt-2"
                            wire:click="removeImage({{ $key }})"
                        >
                            X
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Crea</button>
    </div>
</form>

<style>
    .img-preview {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 250px;
        height: 250px;
    }
</style>