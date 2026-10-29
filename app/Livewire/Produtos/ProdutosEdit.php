<?php

namespace App\Livewire\Produtos;

use App\Models\Produtos;
use Livewire\Component;

class ProdutosEdit extends Component
{
    public $racoes;
    public $medicamentos;
    public $produtos_higiene;

    public function salvar()
    {
    $this->validate([
            'racoes' => 'required',
            'medicamentos' => 'required',
            'produtos_higiene' => 'required|integer',
            
           
    ]);
        Produtos::create([
            'racoes' => $this->racoes,
            'medicamentos' => $this->medicamentos,
            'produtos_higiene' => $this->produtos_higiene,

        ]);

        session()->flash(
        'success',
        'Produto editado com sucesso'
        );

         session()->flash(
        'error',
        'Não foi possível concluir a operação'
        );

    }

    public function render()
    {
         $produtos = Produtos::all();

        return view('livewire.produtos.produtos-edit', compact('produtos'));
    }
}
