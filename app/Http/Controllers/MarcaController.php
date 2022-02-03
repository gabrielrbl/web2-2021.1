<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMarcaRequest;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::orderby('idmarca', 'desc')->get();

        return view('dashboard.consulta.marca', ['marcas' => $marcas]);
    }

    public function create()
    {
        return view('dashboard.cadastro.marca');
    }

    public function store(StoreMarcaRequest $request)
    {
        Marca::create($request->all());

        return redirect()->route('consulta.marca');
    }
}
