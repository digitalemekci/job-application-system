<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class CitizenRegister extends Component
{
    public $name, $email, $password, $password_confirmation;

     /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'citizen',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('cv.upload');
    }

    public function render()
    {
        return view('livewire.auth.citizen-register')->layout('layouts.guest');
    }
}
