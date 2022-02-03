<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderby('idcliente', 'desc')->get();

        return view('dashboard.consulta.cliente', ['clientes' => $clientes]);
    }

    public function create()
    {
        return view('dashboard.cadastro.cliente');
    }

    public function store(StoreClienteRequest $request)
    {
        Cliente::create($request->all());

        return redirect()->route('consulta.cliente');
    }

    public function destroy(Request $request)
    {
        Cliente::findOrFail($request->id)->delete();

        return redirect()->route('clientes.index')->with('msg', 'Excluído com sucesso!');
    }
}
