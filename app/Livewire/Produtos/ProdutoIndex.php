<?php

namespace App\Livewire\Produtos;

use App\Models\Produtos;
use Livewire\Component;

class ProdutoIndex extends Component
{
    
    public function render()
    {
        $produtos = Produtos::all();
        
        return view('livewire.produtos.produtos-index', compact('produtos'));
    }
}
