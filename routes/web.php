<?php

use App\Http\Controllers\CarroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\FabricacaoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ItensEntradaController;
use App\Http\Controllers\ItensVendaController;
use App\Http\Controllers\LocalizacaoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ValvulaController;
use App\Http\Controllers\VendaController;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.index', [
            'produtosmaisvendidos' => DB::select("select * from produtosmaisvendidos(" . date('m') . ")")
        ]);
    })->name('dashboard.index');

    Route::prefix('venda')->group(function () {
        Route::get('/', [VendaController::class, 'index'])->name('venda.index');
        Route::get('{idvenda}/itensVenda/{idproduto?}', [VendaController::class, 'itensVenda'])->name('venda.itensvenda');
        Route::get('{idvenda}/inserirItem', [VendaController::class, 'inserirItem'])->name('venda.inseriritem');
        Route::post('/inserirItemVenda', [ItensVendaController::class, 'store'])->name('itensvenda.store');
        Route::post('/{idvenda}/finalizarVenda', [VendaController::class, 'finalizarVenda'])->name('venda.finalizarvenda');
        Route::post('/store', [VendaController::class, 'store'])->name('venda.store');
        Route::post('/getAutocomplete', [VendaController::class, 'getAutocomplete'])->name('venda.getAutocomplete');
    });

    Route::prefix('entrada')->group(function () {
        Route::get('/', [EntradaController::class, 'index'])->name('entrada.index');
        Route::get('{identrada}/itensEntrada/{idproduto?}', [EntradaController::class, 'itensEntrada'])->name('entrada.itensentrada');
        Route::get('{identrada}/inserirItem', [EntradaController::class, 'inserirItem'])->name('entrada.inseriritem');
        Route::post('/inserirItemEntrada', [ItensEntradaController::class, 'store'])->name('itensentrada.store');
        Route::post('/{identrada}/finalizarEntrada', [EntradaController::class, 'finalizarEntrada'])->name('entrada.finalizarentrada');
        Route::post('/store', [EntradaController::class, 'store'])->name('entrada.store');
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
        Route::get('/cliente', [ClienteController::class, 'create'])->name('cadastro.cliente');
        Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
        Route::get('/fornecedor', [FornecedorController::class, 'create'])->name('cadastro.fornecedor');
        Route::post('/fornecedor', [FornecedorController::class, 'store'])->name('fornecedor.store');
        Route::get('/produto', [ProdutoController::class, 'create'])->name('cadastro.produto');
        Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');
        Route::get('/carro', [CarroController::class, 'create'])->name('cadastro.carro');
        Route::post('/carro', [CarroController::class, 'store'])->name('carro.store');
        Route::get('/localizacao', [LocalizacaoController::class, 'create'])->name('cadastro.localizacao');
        Route::post('/localizacao', [LocalizacaoController::class, 'store'])->name('localizacao.store');
        Route::get('/valvula', [ValvulaController::class, 'create'])->name('cadastro.valvula');
        Route::post('/valvula', [ValvulaController::class, 'store'])->name('valvula.store');
        Route::get('/categoria', [CategoriaController::class, 'create'])->name('cadastro.categoria');
        Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
        Route::get('/motor', [MotorController::class, 'create'])->name('cadastro.motor');
        Route::post('/motor', [MotorController::class, 'store'])->name('motor.store');
        Route::get('/fabricacao', [FabricacaoController::class, 'create'])->name('cadastro.fabricacao');
        Route::post('/fabricacao', [FabricacaoController::class, 'store'])->name('fabricacao.store');
        Route::get('/marca', [MarcaController::class, 'create'])->name('cadastro.marca');
        Route::post('/marca', [MarcaController::class, 'store'])->name('marca.store');
    });

    Route::prefix('usuario')->group(function () {
        Route::get('/perfil', function () {
            return view('dashboard.usuario.perfil');
        })->name('usuario.perfil');
    });
});

require __DIR__.'/auth.php';