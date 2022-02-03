<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocalizacaoRequest;
use App\Models\Localizacao;
use Illuminate\Http\Request;

class LocalizacaoController extends Controller
{
    public function index()
    {
        $localizacoes = Localizacao::orderby('idlocalizacao', 'desc')->get();

        return view('dashboard.consulta.localizacao', ['localizacoes' => $localizacoes]);
    }

    public function create()
    {
        return view('dashboard.cadastro.localizacao');
    }

    public function store(StoreLocalizacaoRequest $request)
    {
        Localizacao::create($request->all());

        return redirect()->route('consulta.localizacao');
    }
}
