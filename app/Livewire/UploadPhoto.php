<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    protected $rules = [
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:1024', // 1MB Max
    ];

    public function save()
    {
        $this->validate();

        if ($this->photo) {
            $this->photo->store('photos');

            session()->flash('message', 'Photo successfully uploaded.');
        } else {
            session()->flash('error', 'Please select a photo to upload.');
        }
    }

    public function render()
    {
        return view('livewire.upload-photo');
    }
}
