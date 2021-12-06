<?php

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
        Route::get('/', function () {
            return view('dashboard.venda.index');
        })->name('venda.index');
        Route::get('/itensVenda', function () {
            return view('dashboard.venda.itensVenda');
        })->name('venda.itensvenda');
    });

    Route::prefix('entrada')->group(function () {
        Route::get('/', function () {
            return view('dashboard.entrada.index');
        })->name('entrada.index');
        Route::get('/itensEntrada', function () {
            return view('dashboard.entrada.itensEntrada');
        })->name('entrada.itensentrada');
    });

    Route::prefix('consulta')->group(function () {
        Route::get('/cliente', function () {
            return view('dashboard.consulta.cliente');
        })->name('consulta.cliente');

        Route::get('/fornecedor', function () {
            return view('dashboard.consulta.fornecedor');
        })->name('consulta.fornecedor');

        Route::get('/produto', function () {
            return view('dashboard.consulta.produto');
        })->name('consulta.produto');

        Route::get('/carro', function () {
            return view('dashboard.consulta.carro');
        })->name('consulta.carro');

        Route::get('/localizacao', function () {
            return view('dashboard.consulta.localizacao');
        })->name('consulta.localizacao');

        Route::get('/valvula', function () {
            return view('dashboard.consulta.valvula');
        })->name('consulta.valvula');

        Route::get('/categoria', function () {
            return view('dashboard.consulta.categoria');
        })->name('consulta.categoria');

        Route::get('/motor', function () {
            return view('dashboard.consulta.motor');
        })->name('consulta.motor');

        Route::get('/fabricacao', function () {
            return view('dashboard.consulta.fabricacao');
        })->name('consulta.fabricacao');

        Route::get('/marca', function () {
            return view('dashboard.consulta.marca');
        })->name('consulta.marca');
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