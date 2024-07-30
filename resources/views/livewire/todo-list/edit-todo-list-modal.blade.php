<div>
    @if($showModal)
    <div class="modal fade show" style="display: block;" tabindex="-1" aria-labelledby="editModalLabel" aria-modal="true" role="dialog">  
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Todo</h5>
                        <button type="button" class="btn-close" wire:click="hideModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" wire:model="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" wire:model="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" wire:model="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="completed">Completed</label>
                                <input type="checkbox" id="completed" wire:model="completed">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
