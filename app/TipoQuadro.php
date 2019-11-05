<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoQuadro extends Model
{
    protected $fillable = [
        'tipo','descricao','imagem'
    ];
}
