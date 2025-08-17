<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class CitizenLogin extends Component
{
    public function render()
    {
        return view('livewire.auth.citizen-login')->layout('layouts.guest');
    }
}
