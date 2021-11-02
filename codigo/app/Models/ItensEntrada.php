<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;
use App\Models\Entrada;

class ItensEntrada extends Model
{
    use HasFactory;

    protected $table = "itens_entradas";

    protected $fillable = [
        'idproduto',
        'identrada',
        'icms',
        'ipi',
        'frete',
        'precocompra',
        'quantidade',
    ];

    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'idproduto', 'id');
    }

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'identrada', 'id');
    }
}
