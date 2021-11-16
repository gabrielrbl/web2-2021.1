<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(StoreClienteRequest $request)
    {
        Cliente::create($request->all());

        return redirect()->route('clientes.index');
    }

    public function show($id)
    {
        if($id){
            $cliente = Cliente::findOrFail($id);

            return view('clientes.show', ['cliente' => $cliente]);
        } else {
            return redirect('clientes/');
        }
    }

    public function edit($id)
    {
        if($id){
            $cliente = Cliente::findOrFail($id);

            return view('clientes.edit', ['cliente' => $cliente]);
        } else {
            return redirect('clientes/');
        }
    }

    public function update(StoreClienteRequest $request)
    {
        Cliente::findOrFail($request->id)->update($request->all());

        return redirect()->route('clientes.index')->with('msg', 'Atualizado com sucesso!');
    }

    public function destroy(Request $request)
    {
        Cliente::findOrFail($request->id)->delete();

        return redirect()->route('clientes.index')->with('msg', 'Excluído com sucesso!');
    }
}
