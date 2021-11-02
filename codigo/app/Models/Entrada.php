<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Fornecedor;
use App\Models\ItensEntrada;

class Entrada extends Model
{
    use HasFactory;

    protected $table = "entradas";

    protected $fillable = [
        'idfornecedor',
        'valortotal',
        'datacompra'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'idfornecedor', 'id');
    }

    function itens_entrada()
    {
        return $this->hasMany(ItensEntrada::class, 'identrada', 'id');
    }
}
