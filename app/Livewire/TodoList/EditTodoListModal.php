<?php

namespace App\Livewire\TodoList;

use App\Models\TodoList;
use Livewire\Component;

class EditTodoListModal extends Component
{
    public $todoListId;
    public $name;
    public $title;
    public $description;
    public $completed;

   protected $listeners = ['showEditModal'];

    public $showModal = false;

    public function showEditModal($id)
    {
        $this->js('alert('.$id.')');
        $todoList = TodoList::findOrFail($id);
        $this->todoListId = $todoList->id;
        $this->name = $todoList->name;
        $this->title = $todoList->title;
        $this->description = $todoList->description;
        $this->completed = $todoList->completed;
        $this->showModal = true; 
    }
    public function showModal()
    {
        $this->showModal = true;
    }

    public function hideModal()
    {
        $this->showModal = false;
    }
    public function save()
    {
        // Implement your update logic here
        $todoList = TodoList::findOrFail($this->todoListId);
        $todoList->update([
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed,
        ]);

        // Emit an event to notify the parent component (PowerGrid) that data has been updated
        $this->emitUp('todoListUpdated');
    }
    public function render()
    {
        return view('livewire.todo-list.edit-todo-list-modal');
    }
}
