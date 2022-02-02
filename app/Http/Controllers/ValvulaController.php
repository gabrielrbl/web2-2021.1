<?php

namespace App\Http\Controllers;

use App\Models\Valvulas;
use Illuminate\Http\Request;

class ValvulaController extends Controller
{
    public function index()
    {
        $valvulas = Valvulas::all();

        return view('dashboard.consulta.valvula', ['valvulas' => $valvulas]);
    }
}
