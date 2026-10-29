<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristicas extends Model
{
    protected $fillable = [
        'marcas',
        'categorias',
        'unidades_medida',
        'tamanhos_embalagens'
    ];

    use HasFactory;
}
