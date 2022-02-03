<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValvulasRequest;
use App\Models\Valvulas;
use Illuminate\Http\Request;

class ValvulaController extends Controller
{
    public function index()
    {
        $valvulas = Valvulas::orderby('idvalvulas', 'desc')->get();

        return view('dashboard.consulta.valvula', ['valvulas' => $valvulas]);
    }

    public function create()
    {
        return view('dashboard.cadastro.valvula');
    }

    public function store(StoreValvulasRequest $request)
    {
        Valvulas::create($request->all());

        return redirect()->route('consulta.valvula');
    }
}
