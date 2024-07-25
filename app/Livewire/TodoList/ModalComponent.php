<?php

namespace App\Livewire\TodoList;

use Livewire\Component;

class ModalComponent extends Component
{
    public $showModal = false;

    public function showModal()
    {
        $this->showModal = true;
    }

    public function hideModal()
    {
        $this->showModal = false;
    }
    public function render()
    {
        return view('livewire.todo-list.modal-component');
    }
}
