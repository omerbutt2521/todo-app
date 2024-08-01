<div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Todo App</h2>
                    </div>
                    <div class="card-body">
                    <!-- Add form modal-->
                    @include('livewire.todo-list.list')   
                    @livewire('todo-list.todo-list-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Include EditTodoListModal component -->
@livewire('todo-list.edit-todo-list-modal')
</div>

