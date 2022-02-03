<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Venda;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "cliente";

    protected $primaryKey = "idcliente";

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telefone',
        'cnpj',
        'cpf',
        'debito'
    ];

    function vendas()
    {
        return $this->hasMany(Venda::class, 'idcliente', 'id');
    }
}
