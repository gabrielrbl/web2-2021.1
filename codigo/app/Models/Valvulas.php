<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valvulas extends Model
{
    use HasFactory;

    protected $table = "valvulas";

    protected $primaryKey = "idvalvulas";

    public $timestamps = false;

    protected $fillable = [
        'quantidade'
    ];
}
