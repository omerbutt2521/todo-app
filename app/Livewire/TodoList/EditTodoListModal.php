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
        $todoList = TodoList::findOrFail($id);
        $this->todoListId = $todoList->id;
        $this->name = $todoList->name;
        $this->title = $todoList->title;
        $this->description = $todoList->description;
        $this->completed = (bool) $todoList->completed;
        $this->showModal = true; 
    }

    public function hideModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $todoList = TodoList::findOrFail($this->todoListId);
        $todoList->update([
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed ? 1 : 0
        ]);

        $this->dispatch('todoListUpdated');
        $this->hideModal();
    }

    public function render()
    {
        return view('livewire.todo-list.edit-todo-list-modal');
    }
}
