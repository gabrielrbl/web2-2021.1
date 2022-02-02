<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Entrada;

class Fornecedor extends Model
{
    use HasFactory;
    
    protected $table = "fornecedores";

    protected $fillable = [
        'nome',
        'cnpj',
        'telefone',
        'endereco'
    ];

    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'identrada', 'id');
    }
}
