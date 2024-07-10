<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemDespesaController;
use App\Http\Controllers\JustificacaoDespesaController;

// Página inicial que lista as justificações de despesas
Route::get('/', [JustificacaoDespesaController::class, 'index'])->name('home');

// Rotas para Justificações de Despesas
Route::resource('justificacoes-despesas', JustificacaoDespesaController::class);
Route::get('/justificacoes-despesas/{id}/itens', [JustificacaoDespesaController::class, 'getItensDespesa']);
// Rotas para adicionar itens de despesas diretamente na justificativa
Route::post('/justificacoes-despesas/{id}/itens', [JustificacaoDespesaController::class, 'addItem'])->name('justificacoes-despesas.itens.store');

// Rotas para Itens de Despesas dentro de Justificações de Despesas
Route::prefix('justificacoes-despesas/{justificacao}/itens')->group(function () {
    Route::get('/', [ItemDespesaController::class, 'index'])->name('justificacoes-despesas.itens.index');
    Route::get('/create', [ItemDespesaController::class, 'create'])->name('justificacoes-despesas.itens.create');
    Route::post('/', [ItemDespesaController::class, 'store'])->name('justificacoes-despesas.itens.store');
    Route::get('/{item}', [ItemDespesaController::class, 'show'])->name('justificacoes-despesas.itens.show');
    Route::delete('/{item}', [ItemDespesaController::class, 'destroy'])->name('justificacoes-despesas.itens.destroy');
});

// Rotas para Itens de Despesas independentes
Route::resource('itens-despesas', ItemDespesaController::class);
