<?php

namespace App\Livewire\Estoque;

use App\Models\Cadastro;
use App\Models\Movimentacao;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Movimentacoes extends Component
{
    public string $produto_id = '';
    public string $tipo = 'entrada';
    public string $quantidade = '';
    public string $observacao = '';

    public function salvar(): void
    {
        $dados = $this->validate([
            'produto_id' => ['required', 'integer', 'exists:cadastros,id'],
            'tipo' => ['required', 'in:entrada,saida'],
            'quantidade' => ['required', 'integer', 'min:1'],
            'observacao' => ['nullable', 'string', 'max:500'],
        ]);

        DB::transaction(function () use ($dados): void {
            $produto = Cadastro::query()
                ->lockForUpdate()
                ->findOrFail($dados['produto_id']);

            $quantidade = (int) $dados['quantidade'];

            if (
                $dados['tipo'] === 'saida'
                && $quantidade > $produto->qtd_disponivel
            ) {
                throw ValidationException::withMessages([
                    'quantidade' => "Saldo insuficiente. Disponível: "
                        . "{$produto->qtd_disponivel} unidade(s).",
                ]);
            }

            if ($dados['tipo'] === 'entrada') {
                $produto->increment('qtd_disponivel', $quantidade);
            } else {
                $produto->decrement('qtd_disponivel', $quantidade);
            }

            Movimentacao::create([
                'produto_id' => $produto->id,
                'user_id' => auth()->id(),
                'tipo' => $dados['tipo'],
                'quantidade' => $quantidade,
                'data_movimentacao' => now(),
                'observacao' => $dados['observacao'] ?? null,
            ]);
        });

        $this->reset(['produto_id', 'quantidade', 'observacao']);
        $this->tipo = 'entrada';

        session()->flash(
            'success',
            'Movimentação registrada e estoque atualizado.'
        );
    }

    public function render()
    {
        return view('livewire.estoque.movimentacoes', [
            'produtos' => Cadastro::query()
                ->orderBy('nome')
                ->get(),

            'historico' => Movimentacao::query()
                ->with(['produto', 'funcionario'])
                ->latest('data_movimentacao')
                ->get(),
        ])->layout('components.layouts.app');
    }
}
