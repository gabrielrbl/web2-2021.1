<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarroRequest;
use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::orderby('idcarro', 'desc')->get();

        return view('dashboard.consulta.carro', ['carros' => $carros]);
    }

    public function create()
    {
        return view('dashboard.cadastro.carro');
    }

    public function store(StoreCarroRequest $request)
    {
        Carro::create($request->all());

        return redirect()->route('consulta.carro');
    }
}
