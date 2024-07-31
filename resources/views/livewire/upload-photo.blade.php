<div class="container mt-4">
    <form wire:submit.prevent="save">
        <div class="form-group">
        @if ($photo) 
            <img src="{{ $photo->temporaryUrl() }}" width="100" height="100">
        @endif
            <input type="file" class="form-control" wire:model="photo">
            @error('photo') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-success" type="submit">Save photo</button>
        </div>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>
    @endif
</div>
