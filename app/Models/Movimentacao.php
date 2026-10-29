<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimentacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'produto_id',
        'user_id',
        'tipo',
        'quantidade',
        'data_movimentacao',
        'observacao',
    ];

    protected function casts(): array
    {
        return [
            'quantidade' => 'integer',
            'data_movimentacao' => 'datetime',
        ];
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Cadastro::class, 'produto_id');
    }

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
