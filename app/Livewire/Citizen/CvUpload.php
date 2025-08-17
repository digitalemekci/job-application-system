<?php

namespace App\Livewire\Citizen;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CvUpload extends Component
{
    use WithFileUploads;

    public $cv;

    public function upload()
    {
        $this->validate([
            'cv' => 'required|mimes:pdf|max:8048', // sadece PDF ve max 8MB
        ]);

        // Dosya storage'a kaydedilir
        $path = $this->cv->store('cvs', 'public'); 

        // Kullanıcıya bağla
        Auth::user()->update([
            'cv_path' => $path,
        ]);

        session()->flash('success', 'CV başarıyla yüklendi.');
    }

    public function render()
    {
        return view('livewire.citizen.cv-upload')
            ->layout('layouts.app'); // Ana layout'un
    }
}
