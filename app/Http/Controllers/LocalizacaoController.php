<?php

namespace App\Http\Controllers;

use App\Models\Localizacao;
use Illuminate\Http\Request;

class LocalizacaoController extends Controller
{
    public function index()
    {
        $localizacoes = Localizacao::all();

        return view('dashboard.consulta.localizacao', ['localizacoes' => $localizacoes]);
    }
}
