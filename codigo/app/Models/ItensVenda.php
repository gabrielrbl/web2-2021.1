<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;
use App\Models\Venda;

class ItensVenda extends Model
{
    use HasFactory;

    protected $table = "itens_vendas";

    protected $fillable = [
        'idproduto',
        'idvenda',
        'valorunitario',
        'quantidade',
    ];

    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'idproduto', 'id');
    }

    public function venda(){
        return $this->belongsTo(Venda::class, 'idvenda', 'id');
    }
}
