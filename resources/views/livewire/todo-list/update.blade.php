<input type="hidden" wire:model="todo_id">
<div class="form-group mb-2">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" placeholder="Enter Title" wire:model="title">
    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group mb-2">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group mb-2">
    <label for="description">Description:</label>
    <input type="text" class="form-control" id="description" placeholder="Enter Description" wire:model="description">
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<button wire:click="update" class="btn btn-dark">Update</button>
<button wire:click="cancel" class="btn btn-danger">Cancel</button>
