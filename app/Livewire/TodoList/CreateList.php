<?php

namespace App\Livewire\TodoList;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\TodoList;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
class CreateList extends Component
{
    use WithPagination, WithoutUrlPagination, LivewireAlert;
    public  $title, $name,$description, $todo_id;
    public $updateMode = false;
    public $showModal = false;
    protected $paginationTheme = 'bootstrap';
    private function resetInputFields(){
        $this->title = '';
        $this->name = '';
        $this->description = '';
    }
    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required|max:100',
            'name' => 'required|max:150',
            'description'=>'required|max:255'
        ]);
        $validatedDate['user_id']=auth()->user()->id;
        TodoList::create($validatedDate);
        $this->resetInputFields();
        $this->alert('success', 'Todo List Added Successfully');
        $this->dispatch('todoListUpdated');
        $this->showModal = false;
    }
    public function showAddModal()
    {
        $this->showModal = true;
    }

    public function hideModal()
    {
        $this->showModal = false;
    }
    public function edit($id)
    {
        $todos = TodoList::findOrFail($id);
        $this->todo_id = $id;
        $this->title = $todos->title;
        $this->name = $todos->name;
        $this->description = $todos->description;
        $this->updateMode = true;
        $this->resetValidation();
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
        $this->resetValidation();
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'name' => 'required',
            'description'=>'required'
        ]);
  
        $todo = TodoList::find($this->todo_id);
        $todo->update([
            'title' => $this->title,
            'name' => $this->name,
            'description' => $this->description,
        ]);
  
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function delete($id)
    {
        TodoList::find($id)->delete();
    }
}
