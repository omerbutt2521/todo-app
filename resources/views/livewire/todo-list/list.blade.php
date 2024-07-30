<div class="container">
    <!-- Add Button -->
    <button type="button" class="btn btn-primary float-end" wire:click="showAddModal">
        Add Todo
    </button>

    <!-- Add Modal -->
    @if($showModal)
    <div class="modal fade show d-block" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Todo</h5>
                    <button type="button" class="btn-close" wire:click="hideModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for creating or updating todo items -->
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="hideModal">Close</button>
                    <button type="button" wire:click="store" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>
