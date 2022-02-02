<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ItensVenda;
use App\Models\ItensEntrada;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produtos";

    protected $fillable = [
        'nome',
        'icms',
        'ipi',
        'frete',
        'precofabrica',
        'precocompra',
        'precovenda',
        'lucro',
        'desconto',
        'quantidade'
    ];

    function itens_venda()
    {
        return $this->hasMany(ItensVenda::class, 'idproduto', 'id');
    }

    function itens_entrada()
    {
        return $this->hasMany(ItensEntrada::class, 'idproduto', 'id');
    }
}
