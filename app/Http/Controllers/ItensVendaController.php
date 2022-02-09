<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItensVendaRequest;
use App\Models\ItensVenda;
use Illuminate\Http\Request;

class ItensVendaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreItensVendaRequest $request)
    {
        $itemVenda = ItensVenda::create($request->all());

        return redirect()->route('venda.itensvenda', [
            'idvenda' => $itemVenda->idvenda
        ]);
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
