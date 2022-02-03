<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMotorRequest;
use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        $motores = Motor::orderby('idmotor', 'desc')->get();

        return view('dashboard.consulta.motor', ['motores' => $motores]);
    }

    public function create()
    {
        return view('dashboard.cadastro.motor');
    }

    public function store(StoreMotorRequest $request)
    {
        Motor::create($request->all());

        return redirect()->route('consulta.motor');
    }
}
