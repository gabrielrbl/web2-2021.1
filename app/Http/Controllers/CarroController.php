<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::all();

        return view('dashboard.consulta.carro', ['carros' => $carros]);
    }
}
