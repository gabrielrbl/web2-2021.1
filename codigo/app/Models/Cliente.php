<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Venda;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";

    protected $fillable = [
        'nome',
        'endereco',
        'debito'
    ];

    function vendas()
    {
        return $this->hasMany(Venda::class, 'idcliente', 'id');
    }
}
