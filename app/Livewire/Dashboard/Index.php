<?php

namespace App\Livewire\Dashboard;

use App\Models\Cadastro;
use App\Models\Movimentacao;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $produtos = Cadastro::query()
            ->orderBy('nome')
            ->get();

        $estoqueBaixo = $produtos->filter(
            fn (Cadastro $produto) => $produto->abaixoDoMinimo()
        );

        $movimentacoesRecentes = Movimentacao::query()
            ->with(['produto', 'funcionario'])
            ->latest('data_movimentacao')
            ->limit(8)
            ->get();

        return view('livewire.dashboard.index', [
            'totalProdutos' => $produtos->count(),
            'unidadesEstoque' => $produtos->sum('qtd_disponivel'),
            'totalEstoqueBaixo' => $estoqueBaixo->count(),
            'estoqueBaixo' => $estoqueBaixo->take(5),
            'movimentacoesRecentes' => $movimentacoesRecentes,
        ])->layout('components.layouts.app');
    }
}
