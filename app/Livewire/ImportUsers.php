<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\UserImportService;

class ImportUsers extends Component
{
    use WithFileUploads;
    public $file;

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $filePath = $this->file->store('imports');

        (new UserImportService)->import(storage_path('app/' . $filePath));

        session()->flash('message', 'Employee imported successfully.');
    }
    public function render()
    {
        return view('livewire.import-users');
    }
}
