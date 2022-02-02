<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();

        return view('dashboard.consulta.marca', ['marcas' => $marcas]);
    }
}
