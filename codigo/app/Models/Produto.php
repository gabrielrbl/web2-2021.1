<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ItensVenda;
use App\Models\ItensEntrada;
use App\Models\Motor;
use App\Models\Carro;
use App\Models\Valvulas;
use App\Models\Fabricacao;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Localizacao;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produto";

    protected $fillable = [
        'idmotor',
        'idcarro',
        'idvalvulas',
        'idfabricacao',
        'idcategoria',
        'idmarca',
        'idlocalizacao',
        'icms',
        'ipi',
        'frete',
        'valornafabrica',
        'valordecompra',
        'lucro',
        'valorvenda',
        'desconto',
        'quantidade',
        'unidade',
        'referencia'
    ];

    function itensvenda()
    {
        return $this->hasMany(ItensVenda::class, 'idproduto', 'id');
    }

    function itensentrada()
    {
        return $this->hasMany(ItensEntrada::class, 'idproduto', 'id');
    }

    function motor()
    {
        return $this->belongsTo(Motor::class, 'idmotor', 'id');
    }
    
    function carro()
    {
        return $this->belongsTo(Carro::class, 'idcarro', 'id');
    }

    function valvulas()
    {
        return $this->belongsTo(Valvulas::class, 'idvalvulas', 'id');
    }

    function fabricacao()
    {
        return $this->belongsTo(Fabricacao::class, 'idfabricacao', 'id');
    }

    function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria', 'id');
    }

    function marca()
    {
        return $this->belongsTo(Marca::class, 'idmarca', 'id');
    }

    function localizacao()
    {
        return $this->belongsTo(Localizacao::class, 'idlocalizacao', 'id');
    }
}
