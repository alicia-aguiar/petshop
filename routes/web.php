<?php

use App\Livewire\Cadastro\CadastroCreate;
use App\Livewire\Cadastro\CadastroEdit;
use App\Livewire\Cadastro\CadastroIndex;
use App\Livewire\Caracteristicas\CaracteristicasCreate;
use App\Livewire\Caracteristicas\CaracteristicasEdit;
use App\Livewire\Caracteristicas\CaracteristicasIndex;
use App\Livewire\Produtos\ProdutoIndex;
use App\Livewire\Produtos\ProdutosCreate;
use App\Livewire\Produtos\ProdutosEdit;
use App\Livewire\User\UsersCreate;
use App\Livewire\User\UsersEdit;
use App\Livewire\User\UsersIndex;
use Illuminate\Support\Facades\Route;

Route::get('/produtos/create', ProdutosCreate::class);
Route::get('/produtos/edit', ProdutosEdit::class);
Route::get('/produtos/index', ProdutoIndex::class);

Route::get('/caracteristicas/create', CaracteristicasCreate::class);
Route::get('/caracteristicas/edit', CaracteristicasEdit::class);
Route::get('/caracteristicas/index', CaracteristicasIndex::class);

Route::get('/cadastro/create', CadastroCreate::class);
Route::get('/cadastro/edit', CadastroEdit::class);
Route::get('/cadastro/index', CadastroIndex::class);

Route::get('/user/create', UsersCreate::class);
Route::get('/user/edit', UsersEdit::class);
Route::get('/user/index', UsersIndex::class);
