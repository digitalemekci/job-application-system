<?php

namespace App\Livewire\Citizen;

use Livewire\Component;
use Livewire\WithFileUploads;

class CvUpload extends Component
{
    use WithFileUploads;

    public $cv;

    public function upload()
    {
        $this->validate([
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = $this->cv->store('cvs', 'public');

        Auth::user()->update(['cv_path' => $path]);

        session()->flash('success', 'CV başarıyla yüklendi.');
    }

    public function render()
    {
        return view('livewire.citizen.cv-upload');
    }
}
