<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\FornecedorController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/store', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/show/{id}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/update', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/destroy', [ClienteController::class, 'destroy'])->name('clientes.destroy');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/store', [ProdutoController::class, 'store'])->name('produtos.store');
});

Route::prefix('entradas')->group(function () {
    Route::get('/', [EntradaController::class, 'index'])->name('entradas.index');
    Route::get('/create', [EntradaController::class, 'create'])->name('entradas.create');
    Route::post('/store', [EntradaController::class, 'store'])->name('entradas.store');
});

Route::prefix('vendas')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('vendas.index');
    Route::get('/create', [VendaController::class, 'create'])->name('vendas.create');
    Route::post('/store', [VendaController::class, 'store'])->name('vendas.store');
});

Route::prefix('fornecedores')->group(function () {
    Route::get('/', [FornecedorController::class, 'index'])->name('fornecedores.index');
    Route::get('/create', [FornecedorController::class, 'create'])->name('fornecedores.create');
    Route::post('/store', [FornecedorController::class, 'store'])->name('fornecedores.store');
    Route::get('/show/{id}', [FornecedorController::class, 'show'])->name('fornecedores.show');
    Route::delete('/destroy', [ClienteController::class, 'destroy'])->name('fornecedores.destroy');
});
