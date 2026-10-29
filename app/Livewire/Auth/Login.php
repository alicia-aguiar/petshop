<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function entrar(): void
    {
        $dados = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['boolean'],
        ]);

        if (! Auth::attempt([
            'email' => $dados['email'],
            'password' => $dados['password'],
        ], $this->remember)) {
            $this->addError('email', 'E-mail ou senha inválidos.');
            return;
        }

        request()->session()->regenerate();
        $this->redirectRoute('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.app');
    }
}
