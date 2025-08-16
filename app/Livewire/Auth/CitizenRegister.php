<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class CitizenRegister extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'type' => 'citizen',
        ]);

        Auth::login($user);

        return redirect()->route('cv.upload');
    }

    public function render()
    {
        return view('livewire.auth.citizen-register')->layout('layouts.app');
    }
}
