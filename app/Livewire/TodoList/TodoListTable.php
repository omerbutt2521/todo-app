<?php

namespace App\Livewire\TodoList;

use App\Models\TodoList;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Illuminate\Support\Facades\Auth;

final class TodoListTable extends PowerGridComponent
{
    use WithExport, LivewireAlert;
    public $todo_id;
    protected $listeners = ['todoListUpdated' => 'refreshData','confirmDelete','delete'];

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $userId = Auth::id();
        return TodoList::query()->where('user_id', $userId);;
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('title')
            ->add('description')
            ->add('completed', function ($task) {
                return $task->completed ? 'Completed' : 'In Progress';
            })
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id') ->visibleInExport(visible: false),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Title', 'title')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Completed', 'completed')
                ->sortable()
                ->searchable(),
            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action') ->visibleInExport(visible: false)
        ];
    }

    public function filters(): array
    {
        return [
         //   Filter::inputText('name')->placeholder('Name')->operators(['contains', 'is', 'is_not']),
            Filter::inputText('title')->placeholder('Title'),
            Filter::boolean('completed')->label('Completed', 'Progress'),
            Filter::multiSelect('name', 'id')
            ->dataSource(User::all())
            ->optionValue('id')
            ->optionLabel('name')

            //Filter::number('price_BRL', 'price')->thousands('.')
            //->decimal(','),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(TodoList $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('btn btn-dark')
                ->dispatch('showEditModal', ['id' => $row->id]) ,
            Button::add('delete')
            ->slot('Delete')
            ->class('btn btn-danger')
            ->dispatch('confirmDelete', ['id' => $row->id])
        ];
    }
    public function confirmDelete($id)
    {
        $this->todo_id = $id;
        $this->confirm('Are you sure do want to delete?', [
            'onConfirmed' =>"delete",
            'position' =>'center'
        ]);
    }
    public function delete()
    {
       TodoList::find($this->todo_id)->delete();
        $this->alert('success', 'Todo deleted successfully!');
        $this->refreshData();
    }
    public function refreshData()
    {
        // Reload the datasource or perform actions to refresh the grid
        $this->resetPage(); // Reset pagination if needed
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
