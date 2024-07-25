<div>
    <div class="modal" tabindex="-1" role="dialog" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Todo List Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Edit form fields -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" wire:model.defer="name">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" wire:model.defer="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" wire:model.defer="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="completed">Completed</label>
                        <input type="checkbox" class="form-check-input" id="completed" wire:model.defer="completed">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
