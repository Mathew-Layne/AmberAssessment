<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $email = '';
    public $name = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function updatedEmail()
    {
        $this->validate(['email' => 'unique:users']);
    }

    public function register()
    {
        $data = $this->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'password' => 'required|min:6|same:passwordConfirmation',
            
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => 'Student',
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
