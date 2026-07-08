<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'codigo',
        'descricao',
        'nome',
        'valor',
        'quantidade'
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'deleted_at' => 'datetime'
    ];
}