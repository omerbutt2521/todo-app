<div>
    @if($updateMode)
        @include('livewire.todo-list.update')
    @else
        @include('livewire.todo-list.create')
    @endif
  
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Title</th>
                <th>Name</th>
                <th>Description</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
            <tr>
            <td>{{ $loop->index + $todos->firstItem() }}</td>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->name }}</td>
                <td>{{ $todo->description }}</td>
                <td>
                <button wire:click="edit({{ $todo->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $todo->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>  {{ $todos->links() }}</div>
    
</div>