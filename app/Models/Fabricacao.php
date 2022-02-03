<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricacao extends Model
{
    use HasFactory;

    protected $table = "fabricacao";

    protected $primaryKey = "idfabricacao";

    public $timestamps = false;

    protected $fillable = [
        'ano'
    ];
}
