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
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $todos = TodoList::paginate(5);
        return view('livewire.todo-list.list',['todos' => $todos]);
    }
    private function resetInputFields(){
        $this->title = '';
        $this->name = '';
        $this->description = '';
    }
    public function store()
    {
        $validatedDate = $this->validate([
            'title' => 'required',
            'name' => 'required',
            'description'=>'required'
        ]);
  
        TodoList::create($validatedDate);
        $this->resetInputFields();
        $this->alert('success', 'Todo List Added Successfully');
        $this->dispatch('todoListUpdated');
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
