<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LancamentosController;
use App\Http\Controllers\RelatorioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Rotas para o CRUD de lançamentos
Route::get('/', [LancamentosController::class, 'index'])->name('lancamentos.index');
Route::get('/lancamentos/create', [LancamentosController::class, 'create'])->name('lancamentos.create');
Route::post('/lancamentos', [LancamentosController::class, 'store'])->name('lancamentos.store');
Route::get('/lancamentos/{id}', [LancamentosController::class, 'show'])->name('lancamentos.show');
Route::get('/lancamentos/{id}/edit', [LancamentosController::class, 'edit'])->name('lancamentos.edit');
Route::put('/lancamentos/{id}', [LancamentosController::class, 'update'])->name('lancamentos.update');
Route::delete('/lancamentos/{id}', [LancamentosController::class, 'destroy'])->name('lancamentos.destroy');
Route::get('/relatorio-saldo-diario', [RelatorioController::class, 'saldoDiarioConsolidado'])->name('relatorio.saldo-diario-consolidado');
