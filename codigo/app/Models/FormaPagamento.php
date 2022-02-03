<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    use HasFactory;

    protected $table = "formapagamento";

    protected $primaryKey = "idformapagamento";

    public $timestamps = false;

    protected $fillable = [
        'condicao',
        'forma'
    ];
}
