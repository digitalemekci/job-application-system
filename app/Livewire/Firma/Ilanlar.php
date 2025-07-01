<?php

namespace App\Livewire\Firma;

use Livewire\Component;
use App\Models\JobPost;

class Ilanlar extends Component
{
    public $ilanlar;

    public function mount()
    {
        $this->ilanlar = JobPost::where('user_id', auth()->id())->latest()->get();
    }

    public function render()
    {
        return view('livewire.firma.ilanlar');
    }
}
