<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Fornecedor;
use App\Models\ItensEntrada;

class Entrada extends Model
{
    use HasFactory;

    protected $table = "entrada";

    protected $primaryKey = "identrada";

    public $timestamps = false;

    protected $fillable = [
        'idfornecedor',
        'valortotalnota',
        'datacompra',
        'status'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'idfornecedor', 'idfornecedor');
    }

    function itensentrada()
    {
        return $this->hasMany(ItensEntrada::class, 'identrada', 'identrada');
    }

    public function countItensEntrada()
    {
        return $this->itensentrada()->sum('quantidade');
    }
}
