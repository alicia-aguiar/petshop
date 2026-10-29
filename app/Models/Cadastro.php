<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'marca',
        'categoria',
        'preco_custo',
        'preco_venda',
        'qtd_disponivel',
        'estoque_minimo',
    ];
    protected function casts(): array
    {
        return [
            'preco_custo' => 'decimal:2',
            'preco_venda' => 'decimal:2',
            'qtd_disponivel' => 'integer',
            'estoque_minimo' => 'integer',
        ];
    }

    public function movimentacoes(): HasMany
    {
        return $this->hasMany(Movimentacao::class, 'produto_id');
    }

    public function abaixoDoMinimo(): bool
    {
        return $this->qtd_disponivel < $this->estoque_minimo;
    }
}

