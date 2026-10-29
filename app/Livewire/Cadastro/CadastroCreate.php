<?php

namespace App\Livewire\Cadastro;

use App\Models\Cadastro;
use Livewire\Component;

class CadastroCreate extends Component
{
    public $nome;
    public $descricao;
    public $marca;
    public $categoria;
    public $preco_custo;
    public $preco_venda;
    public $qtd_disponivel;
    public $estoque_minimo;

    

    public function salvar()
    {

    $this->validate([
            'nome' => 'required',
            'descricao' => 'required|text',
            'marca' => 'required',
            'categoria' => 'required',
            'preco_custo' => 'required|decimal',
            'preco_venda' => 'required|decimal',
            'qtd_disponivel' => 'required|integer',
            'estoque_minimo' => 'required|integer',
    ]);
        Cadastro::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'marca' => $this->marca,
            'categoria' => $this->categoria,
            'preco_custo' => $this->preco_custo,
            'preco_venda' => $this->preco_custo,
            'qtd_disponivel' => $this->qtd_disponivel,
            'estoque_minimo' => $this->estoque_minimo,
        ]);

        session()->flash(
        'success',
        'Produto cadastrado com sucesso'
        );

         session()->flash(
        'error',
        'Não foi possível concluir a operação'
        );

    }


    public function render()
    {
        $cadastros = Cadastro::all(); 

        return view('livewire.cadastro.cadastro-create', compact ('cadastros'));
    }
}
