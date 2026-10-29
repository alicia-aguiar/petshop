<?php

namespace App\Livewire\Cadastro;

use App\Models\Cadastro;
use Livewire\Component;

class CadastroIndex extends Component
{
    public function render()
    {
        $cadastros = Cadastro::all();

        return view('livewire.cadastro.cadastro-index', compact('cadastros'));
    }
}
