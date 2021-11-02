<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;
use App\Models\ItensVenda;

class Venda extends Model
{
    use HasFactory;

    protected $table = "vendas";

    protected $fillable = [
        'idcliente',
        'valortotal',
        'datavenda'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente', 'id');
    }

    function itens_venda()
    {
        return $this->hasMany(ItensVenda::class, 'idvenda', 'id');
    }
}
