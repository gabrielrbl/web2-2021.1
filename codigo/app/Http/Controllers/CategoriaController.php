<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderby('idcategoria', 'desc')->get();

        return view('dashboard.consulta.categoria', ['categorias' => $categorias]);
    }

    public function create()
    {
        return view('dashboard.cadastro.categoria');
    }

    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->all());

        return redirect()->route('consulta.categoria');
    }
}
