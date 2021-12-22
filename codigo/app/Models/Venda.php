<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\ItensVenda;

class Venda extends Model
{
    use HasFactory;

    protected $table = "vendas";

    protected $fillable = [
        'idcliente',
        'idformapagamento',
        'data',
        'valortotal',
        'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente', 'id');
    }

    public function formapagamento()
    {
        return $this->belongsTo(FormaPagamento::class, 'idformapagamento', 'id');
    }

    function itensvenda()
    {
        return $this->hasMany(ItensVenda::class, 'idvenda', 'id');
    }
}
