<?php

namespace App\Livewire\Auth;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function Laravel\Prompts\password;

class Login extends Component
{

    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    protected $messages = [
        'email.required' => 'Campo obrigatório',
        'email.email' => 'Formato incorreto',
        'password.required' => 'Campo obrigatório'
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            session()->regenerate();
            return redirect()->route('movimentacao.index');
        }
        session()->flash('error', 'Email ou senha inválidos');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
