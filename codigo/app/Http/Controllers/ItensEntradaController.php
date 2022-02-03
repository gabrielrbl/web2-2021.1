<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItensEntradaRequest;
use App\Models\ItensEntrada;
use Illuminate\Http\Request;

class ItensEntradaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreItensEntradaRequest $request)
    {
        $itemEntrada = ItensEntrada::create($request->all());

        return redirect()->route('entrada.itensentrada', [
            'identrada' => $itemEntrada->identrada
            ])->with('success', 'Item de entrada cadastrado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
