<div class="container mt-2">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <form wire:submit.prevent="import">
            <div class="form-group">
                <input type="file" class="form-control" wire:model="file">
                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="mt-2 btn btn-primary">Import Users</button>
        </form>
    
</div>
