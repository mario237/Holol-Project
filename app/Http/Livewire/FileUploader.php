<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploader extends Component
{
    use WithFileUploads;

    public $file;
    public $name;
    public $title;
    public $item;

    public function mount($name = null, $src = null)
    {
        $this->name = $name;

        $this->src = $src;
    }
    public function updatedImage()
    {
        $this->validate([
            $this->name => 'required',
        ]);
    }
    public function render()
    {
        return view('livewire.file-uploader');
    }
}
