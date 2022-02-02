<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produto;
use App\Models\Venda;

class ItensVenda extends Model
{
    use HasFactory;

    protected $table = "itensvenda";

    protected $primaryKey = "iditensvenda";

    public $timestamps = false;

    protected $fillable = [
        'idproduto',
        'idvenda',
        'quantidade',
        'valorvenda',
        'desconto',
        'lucro'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'idproduto', 'idproduto');
    }

    public function venda(){
        return $this->belongsTo(Venda::class, 'idvenda', 'idvenda');
    }
}
