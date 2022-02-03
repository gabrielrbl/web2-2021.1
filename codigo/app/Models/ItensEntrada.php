<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;
use App\Models\Entrada;

class ItensEntrada extends Model
{
    use HasFactory;

    protected $table = "itensentrada";

    protected $primaryKey = "iditensentrada";

    public $timestamps = false;

    protected $fillable = [
        'identrada',
        'idproduto',
        'precocompra',
        'quantidade',
        'unidade',
        'ipi',
        'frete',
        'icms'
    ];

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'identrada', 'identrada');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'idproduto', 'idproduto');
    }
}
