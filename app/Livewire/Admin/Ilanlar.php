<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\JobPost;

class Ilanlar extends Component
{
    public $ilanlar;

    public function mount()
    {
        $this->ilanlar = JobPost::with('user')->latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.ilanlar');
    }
}
