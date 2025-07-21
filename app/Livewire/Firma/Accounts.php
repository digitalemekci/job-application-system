<?php

namespace App\Livewire\Firma;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Accounts extends Component
{
    public $accounts;

    public function mount()
    {
        $user = Auth::user();

        if ($user->role !== 'company') {
            abort(403, 'Unauthorized.');
        }

        $this->accounts = User::where('firma_id', $user->firma_id)->get();
    }

    public function render()
    {
        return view('livewire.firma.accounts');
    }
}

