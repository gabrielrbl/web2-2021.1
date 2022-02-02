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

    protected $table = "venda";

    protected $primaryKey = "idvenda";

    public $timestamps = false;

    protected $fillable = [
        'idcliente',
        'idformapagamento',
        'data',
        'valortotal',
        'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idcliente', 'idcliente');
    }

    public function formapagamento()
    {
        return $this->belongsTo(FormaPagamento::class, 'idformapagamento', 'idformapagamento');
    }

    public function itensvenda()
    {
        return $this->hasMany(ItensVenda::class, 'idvenda', 'idvenda');
    }

    public function countItensVenda()
    {
        return $this->itensvenda()->sum('quantidade');
    }
}
