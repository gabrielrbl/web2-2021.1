<?php

use App\Http\Controllers\CarroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\FabricacaoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LocalizacaoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ValvulaController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    })->name('index');

    Route::get('/login', function () {
        return view('login');
    })->name('login');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::prefix('venda')->group(function () {
        Route::get('/', [VendaController::class, 'index'])->name('venda.index');
        Route::get('{idvenda}/itensVenda/{idproduto?}', [VendaController::class, 'itensVenda'])->name('venda.itensvenda');
        Route::get('{idvenda}/inserirItem', [VendaController::class, 'inserirItem'])->name('venda.inseriritem');
        Route::post('{idvenda}/inserirItemVenda', [VendaController::class, 'inserirItemVenda'])->name('venda.inseriritemvenda');
        Route::post('/{idvenda}/finalizarVenda', [VendaController::class, 'finalizarVenda'])->name('venda.finalizarvenda');
        Route::post('/create', [VendaController::class, 'create'])->name('venda.create');
        Route::post('/getAutocomplete', [VendaController::class, 'getAutocomplete'])->name('venda.getAutocomplete');
    });

    Route::prefix('entrada')->group(function () {
        Route::get('/', [EntradaController::class, 'index'])->name('entrada.index');
        Route::get('/itensEntrada', [EntradaController::class, 'itensEntrada'])->name('entrada.itensentrada');
        Route::post('/getAutocomplete', [EntradaController::class, 'getAutocomplete'])->name('entrada.getAutocomplete');
    });

    Route::prefix('consulta')->group(function () {
        Route::get('/cliente', [ClienteController::class, 'index'])->name('consulta.cliente');
        Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('consulta.fornecedor');
        Route::get('/produto', [ProdutoController::class, 'index'])->name('consulta.produto');
        Route::get('/carro', [CarroController::class, 'index'])->name('consulta.carro');
        Route::get('/localizacao', [LocalizacaoController::class, 'index'])->name('consulta.localizacao');
        Route::get('/valvula', [ValvulaController::class, 'index'])->name('consulta.valvula');
        Route::get('/categoria', [CategoriaController::class, 'index'])->name('consulta.categoria');
        Route::get('/motor', [MotorController::class, 'index'])->name('consulta.motor');
        Route::get('/fabricacao', [FabricacaoController::class, 'index'])->name('consulta.fabricacao');
        Route::get('/marca', [MarcaController::class, 'index'])->name('consulta.marca');
    });

    Route::prefix('cadastro')->group(function () {
        Route::get('/cliente', function () {
            return view('dashboard.cadastro.cliente');
        })->name('cadastro.cliente');

        Route::get('/fornecedor', function () {
            return view('dashboard.cadastro.fornecedor');
        })->name('cadastro.fornecedor');

        Route::get('/produto', function () {
            return view('dashboard.cadastro.produto');
        })->name('cadastro.produto');

        Route::get('/carro', function () {
            return view('dashboard.cadastro.carro');
        })->name('cadastro.carro');

        Route::get('/localizacao', function () {
            return view('dashboard.cadastro.localizacao');
        })->name('cadastro.localizacao');

        Route::get('/valvula', function () {
            return view('dashboard.cadastro.valvula');
        })->name('cadastro.valvula');

        Route::get('/categoria', function () {
            return view('dashboard.cadastro.categoria');
        })->name('cadastro.categoria');

        Route::get('/motor', function () {
            return view('dashboard.cadastro.motor');
        })->name('cadastro.motor');

        Route::get('/fabricacao', function () {
            return view('dashboard.cadastro.fabricacao');
        })->name('cadastro.fabricacao');

        Route::get('/marca', function () {
            return view('dashboard.cadastro.marca');
        })->name('cadastro.marca');
    });

    Route::prefix('usuario')->group(function () {
        Route::get('/perfil', function () {
            return view('dashboard.usuario.perfil');
        })->name('usuario.perfil');

        Route::get('/logout', function () {
            return redirect()->route('login');
        })->name('usuario.logout');
    });
});