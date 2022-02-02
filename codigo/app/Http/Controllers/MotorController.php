<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        $motores = Motor::all();

        return view('dashboard.consulta.motor', ['motores' => $motores]);
    }
}
