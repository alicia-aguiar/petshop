<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\Index as Dashboard;
use App\Livewire\Estoque\BaixoEstoque;
use App\Livewire\Estoque\Movimentacoes;
use App\Livewire\Produtos\Index as ProdutosIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => Auth::check()
    ? redirect()->route('dashboard')
    : redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/produtos', ProdutosIndex::class)->name('produtos.index');
    Route::get('/estoque/movimentacoes', Movimentacoes::class)
        ->name('estoque.movimentacoes');
    Route::get('/estoque/baixo', BaixoEstoque::class)
        ->name('estoque.baixo');

    Route::redirect('/produtos/index', '/produtos');
    Route::redirect('/produtos/create', '/produtos');
    Route::redirect('/produtos/edit', '/produtos');
    Route::redirect('/cadastro/index', '/produtos');
    Route::redirect('/cadastro/create', '/produtos');
    Route::redirect('/cadastro/edit', '/produtos');
});
